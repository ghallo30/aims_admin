<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Modelos\Province;
use App\Modelos\Municipality;
use App\Modelos\ImportData;
use App\Modelos\Brgy\Brgy;

// use DB as ;
// use App\Library\AimsMysqlGrammar;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Carbon\Carbon;


class ImportController extends Controller
{
	private $sec_attribute = array('data_rows','data_types','migrations','menus','menu_items', 'indicators',
		'brgy_add_field_values','brgy_add_fields','import_datas',
		'password_resets','permission_role','permissions','roles','settings',
		'temp_project_coop_ben','temp_project_indv_ben','temporarylivestock',
		'temporarymember','temporaryskil','translations','users','user_roles');
	
	// raw insert ignore query function

	// get some models by table
	private function getModelfromTable($tableName){
		$class_mod_name = 'App\\Modelos\\'.studly_case(str_singular($tableName));
		$model_name = NULL;

		if( class_exists($class_mod_name) ) {
			$model_name = new $class_mod_name;	
		}

		// get models
		// $aimss= [];
		// foreach ($aims_table as $tabs) {
		// 	array_push ($aimss, $this->getModelfromTable($tabs));
		// }

		return $model_name;
	}
	
	public function getImport(){
		
		$aims_table = DB::select('SHOW TABLES');
		$aims_table = array_diff(array_map('current',$aims_table), $this->sec_attribute);
		
		// dd($aims_table);

		return view('admin.import_csv.upload_form', compact('aims_table'));
	}

	public function parseImport(Request $request){

		$validators = Validator::make($request->all(), [
			'csv_file' => 'required|file|mimes:csv,txt',
			'attribute_csv' => 'required'
		]);
		
		if ($validators->fails()){
			return redirect()->back()->withErrors($validators);
		}

		if ($request->hasFile('csv_file')) {

			$csv_file = $request->file('csv_file')->store('csv_uploaded');
			// get path error
			// $path = $csv_file->path();
			
			$csv_sample_data=[];
			$csv_header_data=[];
			$csv_details=[];
			$csv_num_column=0;
			$index = 1;

			$have_header = $request->input('csv_header');
			// upload data from csv file  
			if (($handle = fopen($request->file("csv_file"), "r")) !== FALSE) {
				while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
						
					if ($have_header && $index === 1 ){
						$csv_header_data = $row; 
					} else {
						array_push($csv_details, $row);
						// print_r($row);	
					}
					if($index < 5){
						array_push($csv_sample_data, $row);
					}
					$index++;
				}
				fclose($handle);
				
				if(isset($csv_details)){
					// dd(count(reset($csv_sample_data)));
					$csv_data_file = ImportData::create([
						'data_filename' => $request->file('csv_file')->getClientOriginalName(),
						'csv_header' => $request->has('csv_header'),
						'csv_data' => json_encode($csv_details),
						'entity_use' => $request->attribute_csv
					]);

				}
				

				// attempt to get model
				// $this->entity_use = $request->attribute_csv;
				$aimss = $this->getModelfromTable($request->attribute_csv);
				
				if(isset($aimss)){
					$data_fillable = $aimss->getFillable();
					array_push($data_fillable, 'None'); 
				}
				// dd($data_fillable);
				if ($have_header) {
					return view('admin.import_csv.match_import', compact('csv_header_data', 'csv_sample_data', 'data_fillable', 'csv_data_file' ));
				} else {
					$csv_header_data = range(1, count(reset($csv_sample_data)));
					return view('admin.import_csv.match_import', compact('csv_header_data','csv_sample_data', 'data_fillable', 'csv_data_file' ));					
				}
			}

		} else {
			return redirect(route('admin.import_brgy'));
		}

	}

	public function processImport(Request $request){
		$imported_data = ImportData::find($request->csv_file_data_id);
		$csv_data = json_decode($imported_data->csv_data, true);

		// dd($request->imp_fields);
		$ch = $request->imp_fields;
		$data_append = [];
		$chk_dup_data = [];
		$not_inserted= []; 
		$entity_insert = $this->getModelfromTable($imported_data->entity_use);
		if($entity_insert!==NULL){
			$bargs= new $entity_insert();
			// dd($bargs);
		}
		
		$d_now = Carbon::now('utc')->toDateTimeString(); 
		
		foreach ($csv_data as $row_data) {
			$tempdata=[];
			$emp_foreign = false;
			foreach ($ch as $index => $field) {
				if ($imported_data->csv_header) {
						// $contact->$field = $row[$request->fields[$field]];
				} else {
						if($field==="None"){
							continue;
						} else{
							// if data insertion
							// check if foreign key data exist.
							
							if( isset($bargs) && $bargs->getPaerentAttr()=== $field){
								// $muns=Municipality::where( 'name' , $row_data[$index-1] )->first();
								$muns = DB::table( str_plural(str_replace('_id',NULL, $field) ))
												->select('id','name')
												->where('name', $row_data[$index-1] )->first();
								// dd($muns->name);
								if( isset($muns) ){
									$emp_foreign=false;
									$tempdata[$field]=$muns->id;
									$temp_chk[$field] = $muns->id;
								} else {

									// $msg = $row_data[$index-1]." - Invalid Municipality. Please check if municipality was stored";
									// dd($msg);
									// $tempdata[$field]=$muns->id;
									$emp_foreign=true;
									$tempdata[$field]=$row_data[$index-1];

								}

							} else {
								if( in_array($field, $bargs->getChkFilledDuplicate()) ){
									$temp_chk[$field] = $row_data[$index-1];
								}

								$tempdata[$field]=$row_data[$index-1];
							}

							$tempdata['created_at'] = $d_now; 
							$tempdata['updated_at'] = $d_now;
						}
				}
			}
			// not included on data insertion due to foreign not exist
			if ($emp_foreign) {
				array_push($not_inserted , $tempdata);
			} else {
				array_push($chk_dup_data, $temp_chk);
				array_push($data_append, $tempdata);
			}
			

		}

		$before_ins = DB::table($imported_data->entity_use)->select('id')->count();
		// last id before insert
		// DB::table($imported_data->entity_use)->

		// test
		// dd (DB::table($imported_data->entity_use)->updateOrCreate($data_append);

		// change insert to insert ignore
		$questionMarks = '';
		$values = [];
		foreach ($data_append as $k => $data_array) {
	        
	            if ($k > 0) {
	                $questionMarks .= ',';
	            }
	            $questionMarks .= '(?' . str_repeat(',?', count($data_array) - 1) . ')';
	            $values = array_merge($values, array_values($data_array));
	    }

	    $query = 'INSERT IGNORE INTO ' . $imported_data->entity_use . ' (' . implode(',', array_keys($data_array)) . ') VALUES ' . $questionMarks;
	    DB::insert($query, $values);
	    $after_ins = DB::table($imported_data->entity_use)->select('id')->count();



	    // dd($after_ins-$before_ins);
	    // dd(mysql_affected_rows());
	    
		// DB::insert('INSERT IGNORE INTO '.$imported_data->entity_use.' ('.implode(',',array_keys($data_append[0])).
  //       ') values (?'.str_repeat(',?',count($data_append) - 1).')',array_values($data_append));
			
		// DB::table($imported_data->entity_use)->insert($data_append);
		// dd($chk_dup_data);

		return view('admin.import_csv.import_done', compact('data_append'));

	}
}
