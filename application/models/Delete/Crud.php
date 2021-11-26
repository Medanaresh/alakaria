<?php
defined('BASEPATH') or die('Please set up the configuration');
/*purpose of this model is reusability of common codes for every controller*/
Class Crud extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
public function commonInsert($table, $insertdata, $displaymessage = NULL, $debug = NULL)
    {
        $response = array();
        //$sql_show= $this->db->set($insertdata)->get_compiled_insert($table);
        if (is_array($insertdata)) {
             $sql = $this->db->insert_string($table, $insertdata);
            
            if (isset($debug) && $debug == 'debug') {
                $response[QUERY_MESSAGE] = $sql;
            } else {
                $insert = $this->db->query($sql);
                $error = $this->db->error();
                $error_message = $error['message'];
                if ($error['code'] == 0) {
                    try {
                        if ($insert) {
                            $response[CODE] = SUCCESS_CODE;
                            $response[MESSAGE] = 'Success';
                            $response[DESCRIPTION] = $displaymessage;
                            $response[INSERTED_ID] = $this->db->insert_id();
                        } else {
                            throw new Exception('Error occured while inserting data');
                        }
                    } catch (Exception $ex) {
                        $response[CODE] = FAIL_CODE;
                        $response[MESSAGE] = 'Fail';
                        $response[DESCRIPTION] = 'Some thing error occured';
                    }
                } else {
                    $response[CODE] = DB_ERROR_CODE;
                    $response[MESSAGE] = 'Databse Error';
                    $response[DESCRIPTION] = $error_message;
                }
                if (QUERY_DEBUG == 1) {
                    $response[QUERY_DEBUG_MESSAGE] =$this->db->last_query();
                  //  $response[QUERY_MESSAGE] = $sql;
                }
            }
        } else {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Invalid format';
            $response[DESCRIPTION] = 'Input data is in invalid format';
        }
        return json_encode($response);
    }

    public function common_insert($params)
    {
                $response=array();
                if(!is_array($params))
                {
                        $response['code']=301;
                        $response['message']='Valiadtion';
                        $response['description']='Invalid input parameters';
                }
                else
                {
                        $table_name=  isset($params['table_name'])?$params['table_name']:'';
                        $table_insert_data=isset($params['insert_data'])?$params['insert_data']:'';
                        $success_message=isset($params['success_message'])?$params['success_message']:'';
                        $error_message=isset($params['error_message'])?$params['error_message']:'';
                        $debug=isset($params['debug'])?$params['debug']:0;
                        if(!empty($table_name) && is_array($table_insert_data) && (count($table_insert_data) > 0))
                        {
                                $table_name=  trim($table_name);
                                //Insert condition
                                $insert_sql=$this->db->insert_string($table_name,$table_insert_data);
                                if($debug==0)
                                {
                                    $success_message=($success_message!='')?$success_message:'Inserted successfully';
                                    $error_message=($error_message!='')?$error_message:'Unable to insert';
                                    $insert=  $this->db->query($insert_sql);
                                    //echo $this->db->last_query();exit;
                                    $db_error=  $this->db->error();
                                    if($db_error['code']==0)
                                    {
                                        $insert_row_count=  $this->db->affected_rows();
                                        $last_insert_id=  $this->db->insert_id();
                                        $response['code']=($insert_row_count > 0)?200:204;
                                        $response['message']=($insert_row_count > 0)?'success':'fail';
                                        $response['description']=($insert_row_count > 0)?$success_message:$error_message;
                                        $response['insert_id']=($insert_row_count > 0)?$last_insert_id:0;
                                    }
                                    else
                                    {
                                        $response['code']=575;
                                        $response['message']='Data base error';
                                        $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Please inform to support team';
                                    }
                                }
                                else
                                {
                                    $response['code']=575;
                                    $response['message']='Debug mode';
                                    $response['description']=$insert_sql;
                                }
                        }
                        else
                        {
                                $response['code']=301;
                                $response['message']='Valiadtion';
                                $response['description']='Table name or insert data is missing';
                        }
                }
                return json_encode($response);
    }
    
    public function common_update($params)
    {
        //echo "test";exit;
                $response=array();
                if(!is_array($params))
                {
                        $response['code']=301;
                        $response['message']='Valiadtion';
                        $response['description']='Invalid input parameters';
                }
                else
                {
                        $table_name=  isset($params['table_name'])?$params['table_name']:'';
                        $table_update_data=isset($params['update_data'])?$params['update_data']:'';
                        $table_update_condition=isset($params['update_condition'])?$params['update_condition']:'';
                        $success_message=isset($params['success_message'])?$params['success_message']:'';
                        $error_message=isset($params['error_message'])?$params['error_message']:'';
                        $debug=isset($params['debug'])?$params['debug']:0;
                        if(!empty($table_name) && is_array($table_update_data) && (count($table_update_data) > 0) && is_array($table_update_condition) && (count($table_update_condition) > 0))
                        {
                                $table_name=  trim($table_name);
                                //Insert condition
                                $update_sql=$this->db->update_string($table_name,$table_update_data,$table_update_condition);
                                if($debug==0)
                                {
                                    $success_message=($success_message!='')?$success_message:'updates successfully';
                                    $error_message=($error_message!='')?$error_message:'Unable to update';
                                    $update=  $this->db->query($update_sql);
                                    //echo $this->db->last_query();exit;
                                    $db_error=  $this->db->error();
                                    if($db_error['code']==0)
                                    {
                                        $update_row_count=  $this->db->affected_rows();
                                        $response['code']=($update_row_count > 0)?200:204;
                                        $response['message']=($update_row_count > 0)?'success':'fail';
                                        $response['description']=($update_row_count > 0)?$success_message:$error_message;
                                    }
                                    else
                                    {
                                        $response['code']=575;
                                        $response['message']='Data base error';
                                        $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Please inform to support team';
                                    }
                                }
                                else
                                {
                                    $response['code']=575;
                                    $response['message']='Debug mode';
                                    $response['description']=$update_sql;
                                }
                        }
                        else
                        {
                                $response['code']=301;
                                $response['message']='Valiadtion';
                                $response['description']='Table name or insert data is missing';
                        }
                }
                return json_encode($response);
    }

    public function common_delete($table,$conditionarray)
    {
        $response=array();
        $sql=$this->db->delete($table,$conditionarray);
        $action=$this->db->affected_rows();
            $response['code']='200';
            $response['message']='Success';
            $response['description']=$action.' Deleted Succesfully !!!';
         return json_encode($response);
    }
    //Check existance Code Start*/
    public function checkExistance($colname,$table,$checkarray)
    {
        $check=$this->db->select($colname)->from($table)->where($checkarray)->get()->num_rows();
        //print_r($this->db);
        return ($check > 0)?1:0;/*If Existance it will retuen 1 else 0*/
    }
    //Multiple  Insert
    public function batchInsert($table,$insertdata,$displaymessage=NULL)
    {
        $response=array();
        $sql=$this->db->insert_batch($table,$insertdata);
        // echo $this->db->last_query();exit;
        $affected_rows=$this->db->affected_rows();
        $response['code']=($affected_rows > 0)?200:204;
        $response['message']=($affected_rows > 0)?'Success':'Fail';
        $response['description']=($affected_rows > 0)?"$affected_rows  records added successfully":'Unable to insert';
        return json_encode($response);
    }
    
    /*
      |--------------------------------------------------------------------------
      | Function : check(column,tablename,wherecondition)
      |--------------------------------------------------------------------------
      |  column          :  Search ID (Single column name)
      |  tablename      :  table name
      |  wherecondition :  colmnname => inputdata (wherecondition should be in array format)
      |  Example        :  commonCheck('ID','table_name',array('colmn'=>'abcd','colmn2'=>'abcd'));
      |  Result         :   It will return 0 or 1.(If count exists it will return 1 other wise it will return as 0)
     */

    public function commonCheck($cols, $table, $wherecondition) {
        $count = $this->db->select($cols)->from($table)->where($wherecondition)->get()->num_rows();
         // echo $this->db->last_query();exit;
        return ($count > 0) ? 1 : 0;
    }

    public function getEmail($cols,$table,$where_col,$id)
    {
        $response=array();
        $this->db->select($cols)->from($table);
        $sql_fetch=$this->db->where_in($where_col,$id)->get();
        //print_r($sql_fetch);exit;
        $db_error =  $this->db->error();
        if($db_error['code']!=0)
        {
                $response['code']='575';
                $response['message']='DB Error';
                $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Some thing error occured';
        }
        else
        {       //if()
                $count=$sql_fetch->num_rows();
                $response['code']=($count  > 0 )?200:204;
                $response['message']=($count  > 0 )?'Success':'Fail';
                $response['description']=($count  > 0 )?'Getting the user llist':'No results found';
                $response['result_count']=$count;
                $response['common_result']=($count  > 0 )?$sql_fetch->row():(object) null;
        }
        return json_encode($response);
    }

    public function getEmailMulti($cols,$table,$where_col,$id)
    {
        $response=array();
        $this->db->select($cols)->from($table);
        $sql_fetch=$this->db->where_in($where_col,$id)->get();
        //print_r($sql_fetch);exit;
        $db_error =  $this->db->error();
        if($db_error['code']!=0)
        {
                $response['code']='575';
                $response['message']='DB Error';
                $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Some thing error occured';
        }
        else
        {       //if()
                $count=$sql_fetch->num_rows();
                $response['code']=($count  > 0 )?200:204;
                $response['message']=($count  > 0 )?'Success':'Fail';
                $response['description']=($count  > 0 )?'Getting the user llist':'No results found';
                $response['result_count']=$count;
                $response['common_result']=($count  > 0 )?$sql_fetch->result():(object) null;
        }
        return json_encode($response);
    }

    public function common_record_count($cols,$table_name,$order_by_col=null)
    {       
        $sql=$this->db->select($cols)->from($table_name)->get();
        $count=$sql->num_rows();
        return $count;
    }
    public function common_record_count2($cols,$table_name,$order_by_col=null,$where)
    {       
        $sql=$this->db->select($cols);
        if(!empty($where))
        {
            $this->db->where($where);
        }
        $this->db->order_by($order_by_col,'DESC');
        $sql=$this->db->get($table_name);
        $count=$sql->num_rows();
        return $count;
    }
    
    public function common_list_paging12($cols,$table_name,$like_col,$orderby=null,$limit=null,$start,$search,$where=null,$searchstr=null)
    {

        //print_r($like_col);
        $response=array();
        $sql=$this->db->select($cols)->from($table_name);
        if ($search == '') {
            $this->db->limit($limit, $start);
        }
        if ($search != '') {
            ($search != '') ? $this->db->like($like_col,$search,'after') : '';
        }
        if($searchstr!=''){
            $this->db->group_start();
             ($searchstr != '') ? $this->db->or_like($searchstr,'after') : '';
             $this->db->group_end();
        }

        //$sql=$this->db->limit($limit, $start);
        if(!empty($where))
        {
            $this->db->where($where);
        }
        $query=$sql->order_by($orderby,'desc')->get();

        // echo $this->db->last_query();exit;
        $db_error=$this->db->error();
        if($db_error['code']!=0){
            $response['code']='575';
            $resposne['message']='';
            $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Some thing error occured';
        }
        else
        {
            $count=$query->num_rows();
            // echo $count;exit;
            $response['code']=($count > 0)?200 :204;
            $response['message']=($count>0 )?'Success':'Fail';
            $response['description']=($count  > 0 )?'Getting the list':'No results found';
            $response['result_count']=$count;
            $response['common_result']=($count  > 0 )?$query->result():(object) null;
            $response['count']=$count;
            $response['search_category'] = array('search' => $search);
         }
        return json_encode($response);       
    }
    public function commonStatusActivity($tablename,$setcolumns,$updatevalue,$wherecondition)
    {
        $updateStatus=($updatevalue==1)?'Activated':'De-activated';
        $sql=$this->db->update_string($tablename,array($setcolumns=>$updatevalue),$wherecondition);
     $qry=$this->db->query($sql);
      // echo $this->db->last_query();exit;
         $response['test']= $sql;
        $update=$this->db->affected_rows();
        $response[CODE]=($update > 0)?SUCCESS_CODE:FAIL_CODE;
        $response[MESSAGE]=($update > 0)?'Success':'Fail';
        $response[DESCRIPTION]=($update > 0)?"<b>$update</b> Record $updateStatus successfully":'Unable to update';
        return json_encode($response);
    }
     public function commonStatusActivity_new($tablename,$setcolumns,$updatevalue,$wherecondition)
    {
        $updateStatus=($updatevalue==1)?'Activation Status':'De-activation Status';
        $sql=$this->db->update_string($tablename,array($setcolumns=>$updatevalue,'paid_date'=>date('Y-m-d H:i:s')),$wherecondition);
     $qry=$this->db->query($sql);
     // echo $this->db->last_query();exit;
         $response['test']= $sql;
        $update=$this->db->affected_rows();
        $response[CODE]=($update > 0)?SUCCESS_CODE:FAIL_CODE;
        $response[MESSAGE]=($update > 0)?'Success':'Fail';
        $response[DESCRIPTION]=($update > 0)?"<b>$update</b> record updated successfully":'Unable to update';
        return json_encode($response);
    }
    public function commonDelete($table,$condition,$relationname=null)
    {
        $relationname=($relationname)?$relationname:"";
        $response=array();
        $sql=$this->db->delete($table,$condition);
        $delete=$this->db->affected_rows();
         // echo $this->db->last_query();exit;
        $response[CODE]=($delete > 0)?SUCCESS_CODE:FAIL_CODE;
        $response[MESSAGE]=($delete > 0)?'Success':'Fail';
        $response[DESCRIPTION]=($delete > 0)?"<b>$delete</b> $relationname":'Unable to delete';
        return json_encode($response);
    }

    /*>>Getting data from table using single where condition code starts*/
    public function getDataWhere($cols,$table_name,$where_col,$where_col_val,$list_name)
    {
        $response=array();
        $this->db->select($cols)->from($table_name);
        $query=$this->db->where($where_col,$where_col_val)->get();
        //echo $this->db->last_query();exit;
        $db_error=$this->db->error();
        if($db_error['code']!=0){
            $response['code']='575';
            $resposne['message']='';
            $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Some thing error occured';
        }
        else
        {
            $count=$query->num_rows();
            $response['code']=($count > 0)?200 :204;
            $response['message']=($count  > 0 )?'Success':'Fail';
            $response['description']=($count  > 0 )?'Getting the '.$list_name.' data':'No results found';
            $response['result_count']=$count;
            $response[($list_name!='')?$list_name:'common_result']=($count  > 0 )?$query->row():(object) null;
        }
        return json_encode($response);
    }
    /*<<Getting data from table using single where condition code ends*/

     public function commonUpdate($table, $update_data, $update_condition, $displaymessage = NULL, $debug = NULL,$failmessage=NULL) 
     {
          // echo "update";exit;
        $response = array();
        if (is_array($update_data) && is_array($update_condition)) {
            $sql = $this->db->update_string($table, $update_data, $update_condition);
            if (isset($debug) && $debug == 'debug') {
                $response[QUERY_MESSAGE] = $sql;
                 // echo $this->db->last_query();exit;
            } else {
                $update = $this->db->query($sql);
                   // echo $this->db->last_query();exit;
                $error = $this->db->error();
                $error_message = $error['message'];
                if ($error['code'] == 0) {
                    try {
                        $count = $this->db->affected_rows();
                        if ($count > 0) {
                            $response[CODE] = SUCCESS_CODE;
                            $response[MESSAGE] = 'Success';
                            $response[DESCRIPTION] = $displaymessage;
                        } else {
                            $response[CODE] = FAIL_CODE;
                            $response[MESSAGE] = 'Fail';
                            $response[DESCRIPTION] =!empty($failmessage)?$failmessage:'Data not updated';
                        }
                    } catch (Exception $ex) {
                        $response[CODE] = FAIL_CODE;
                        $response[MESSAGE] = 'Fail';
                        $response[DESCRIPTION] = 'Some thing error occured';
                    }
                } else {
                    $response[CODE] = DB_ERROR_CODE;
                    $response[MESSAGE] = 'Database Error';
                    $response[DESCRIPTION] = $error_message;
                }
                if (QUERY_DEBUG == 1) {
                    $response[QUERY_DEBUG_MESSAGE] = $error_message;
                    $response[QUERY_MESSAGE] = $sql;
                }
            }
        } else {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Invalid format';
            $response[DESCRIPTION] = 'Input data is in invalid format';
        }
        return json_encode($response);
    }

    /*>>Getting data from table code starts*/
    public function getData($cols,$table_name,$list_name)
    {
        $response=array();
        $query=$this->db->select($cols)->from($table_name)->get();
        // echo $this->db->last_query();exit;
        $db_error=$this->db->error();
        if($db_error['code']!=0){
            $response['code']='575';
            $resposne['message']='';
            $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Some thing error occured';
        }
        else
        {
            $count=$query->num_rows();
            $response['code']=($count > 0)?200 :204;
            $response['message']=($count  > 0 )?'Success':'Fail';
            $response['description']=($count  > 0 )?'Getting the '.$list_name.' data':'No results found';
            $response['result_count']=$count;
            $response[($list_name!='')?$list_name:'common_result']=($count  > 0 )?$query->result():(object) null;
        }
        return json_encode($response);
    }
//written by jitendra 
public function get_join_records($params,$debug=null){
    $response=array();
    $count=$params['join_count'];
    if($count>0)
    for($i=1;$i<=$count;$i++)
    {
       ${"join".$i}=explode(',',$params["join$i"]);
    }
        $this->db->select($params['select']);
        $this->db->from($params['from_tbl']);
        if($count>0)
        {
      for($i=1;$i<=$count;$i++)
    {
         $this->db->join(${'join'.$i}[0],${'join'.$i}[1],${'join'.$i}[2]);
     }
        }
    if(!empty($params['where1']))
    {
        $this->db->where($params['where1']);
    }
    if(!empty($params['search']))
    {
        $this->db->group_start();
$this->db->or_like($params['search'],'both');
$this->db->group_end();
    }
        $query=$this->db->get();
          // echo $this->db->last_query();exit;
        $count=$query->num_rows();
        $response[CODE] = ($count>0)?SUCCESS_CODE:FAIL_CODE;
       $response['count']=$count;
       $response['result']=($count>0)?$query->result():null;
       (isset($debug))?$response['debug']=$this->db->last_query():'';
       return json_encode($response);
}
public function common_joins($params,$debug=null){
    $response=array();
    $count=$params['join_count'];
    if($count>0)
    for($i=1;$i<=$count;$i++)
    {
       ${"join".$i}=explode(',',$params["join$i"]);
    }
        $this->db->select($params['select']);
        $this->db->from($params['from_tbl']);
        if($count>0)
        {
      for($i=1;$i<=$count;$i++)
    {
         $this->db->join(${'join'.$i}[0],${'join'.$i}[1],${'join'.$i}[2]);
     }
        }
    if(!empty($params['where1']))
    {
        $this->db->where($params['where1']);
    }
    if(!empty($params['search']))
    {
        $this->db->group_start();
$this->db->or_like($params['search'],'both');
$this->db->group_end();
    }
        $query=$this->db->get();
          // echo $this->db->last_query();exit;
        $count=$query->num_rows();
       if($count>0)
       {
        return $query->result();
       }
       else
       {
        return array();
       }
}
//end join  by jitendra
public function common_check($table,$where){
    $count=$this->db->where($where)->get($table)->num_rows();
     return  $this->db->last_query();
       return $count;
}
public function common_newupdate($table,$where,$data){
    $res=$this->db->where($where)->update($table,$data);
    $count=$this->db->affected_rows();
    if($count>0)
    {
        return true;
    }
    else
    {
        return false;
    }
}
public function common_update_count($where,$table,$data){
    $this->db->where($where);
    $this->db->update($table,$data);
   $affetcted_rows= $this->db->affected_rows();
   return $affetcted_rows;
}
public function common_del($where,$table){
    $this->db->where($where);
    $this->db->delete($table);
    $affetcted_rows= $this->db->affected_rows();
   return $affetcted_rows;
}
public function common_list_paging($cols,$table_name,$like_col,$orderby=null,$limit=null,$start,$search,$where=null,$searchstr=null,$or_like_col=null,$join_tbl=NULL,$join_condition=NULL)
   {
       //print_r($like_col);
       $response=array();
       $this->db->select($cols)->from($table_name);
       if(!empty($join_tbl))
       {
           $this->db->join($join_tbl,$join_condition);
       }
       if ($search == '') {
           $this->db->limit($limit, $start);
       }
       if ($search != '') {
           ($search != '') ? $this->db->like($like_col,$search,'both') : '';
       }
     if ($or_like_col != '') {
          $this->db->or_like($or_like_col,$search,'both');
       }
       if($searchstr!=''){
           $this->db->group_start();
            ($searchstr != '') ? $this->db->or_like($searchstr,'both') : '';
            $this->db->group_end();
       }
       if(!empty($where))
       {
           $this->db->where($where);
       }
       $query=$this->db->order_by($orderby,'desc')->get();
       // echo $this->db->last_query();exit;
       $db_error=$this->db->error();
       if($db_error['code']!=0){
           $response['code']='575';
           $resposne['message']='';
           $response['description']=(QUERY_DEBUG==1)?$db_error['message']:'Some thing error occured';
       }
       else
       {
           $count=$query->num_rows();
           $response['code']=($count > 0)?200 :204;
           $response['message']=($count  > 0 )?'Success':'Fail';
           $response['description']=($count  > 0 )?'Getting the list':'No results found';
           $response['result_count']=$count;
           $response['common_result']=($count  > 0 )?$query->result():(object) null;
           $response['count']=$count;
           $response['search_category'] = array('search' => $search);
        }
       return json_encode($response);       
   }
   public function common_get_row($table,$where,$select=null){
       $response=array();
       $select=($select)?$select:"*";
       $query=$this->db->select($select)->where($where)->get($table);
        // echo $this->db->last_query();exit;
       $count=$query->num_rows();
       $response[CODE] = ($count>0)?SUCCESS_CODE:FAIL_CODE;
       $response['count']=$count;
       $response['result']=($count>0)?$query->row():null;
       return json_encode($response);
}

 public function common_get_all($table,$select=null,$where=null,$order_by_col=null,$order_by=null){
       $response=array();
       // if(is_array($select))
       // {
       //  $where=$select;
       //  $select=$where;
       // }

        $select=($select)?$select:"*";
    $this->db->select($select);
       if(!empty($where))
       {
        $this->db->where($where);
       }
        if(!empty($order_by_col) && !empty($order_by))
       {
        $this->db->order_by($order_by_col,$order_by);
       }
       $query=$this->db->get($table);
        // echo $this->db->last_query();exit;
       $count=$query->num_rows();
       $response[CODE] = ($count>0)?SUCCESS_CODE:FAIL_CODE;
       $response['count']=$count;
       $response['result']=($count>0)?$query->result():null;
       return json_encode($response);
}
 public function get_row($table,$where,$select=null,$debug=null){
    // print_r($where);exit;
    $select=($select)?$select:"";
       $response=array();
       $query=$this->db->select($select)->where($where)->get($table);
       if($debug)
       {
        // echo $this->db->last_query();exit;
       } 
       $count=$query->num_rows();
      if($count>0)
      {
        return $query->row();
      }
      else
      {
        return null;
      }
}
 public function getCount($data=null,$table=null,$where=null,$select=null){
    // in two ways we can send all parameters 
    if(empty($table))
    {
        // send all parameters once
           $select=($data['select'])?$data['select']:"*";
           if(is_array($data['where']))
           {
           $this->db->select($select);
           $this->db->where($data['where']);
           $query=$this->db->get($data['table']);
           $count=$query->num_rows();
       }
       else
       {
        echo "where is not in array format";exit;
       }
   }else{
     // send all parameters one by one
    if(!empty($table) && !empty($where))
    {
       $select=($select)?$select:"*";
        if(is_array($where))
           {
           $this->db->select($select);
           $this->db->where($where);
           $query=$this->db->get($table);
           $count=$query->num_rows();
       }
       else
       {
         echo "where is not in array format";exit;
       }
    }
    else
    {
        echo "Table or where parameter is empty";exit;
    }
  }
// echo $this->db->last_query();exit;
  // print_r($this->db->error()['message']);exit;
       return $count;
}
  public function common_get($table,$where=null,$select=null,$order_by_col=null,$order_by=null)
    {
       
        $select=($select)?$select:"*";
    $this->db->select($select);
       if(!empty($where))
       {
        $this->db->where($where);
       }
       if(!empty($order_by_col) && !empty($order_by))
       {
        $this->db->order_by($order_by_col,$order_by);
       }
       $query=$this->db->get($table);
        // echo $this->db->last_query();exit;
       $count=$query->num_rows();
       if($count>0)
       {
        return $query->result();
       }
       else
       {
        return array();
       }
    } 
     public function delete($table,$condition,$relationname=null)
    {
        $sql=$this->db->delete($table,$condition);
        $delete=$this->db->affected_rows();
       if($delete>0)
       {
        return true;
       }
       else
       {
        return false;
       }
    }  
}