<?php
/**
* @author Saurabh kumar <saurabh.nitc10@gmail.com>
* @copyright Copyright (c) 2012, Saurabh kumar
* @license http://www.gnu.org/licenses/gpl.html GNU General Public License 
* @package user
*/
/**
* Includes files for database connectivity.
*/
include_once 'function.php';
/**
* Class patient for managing patient
* @package patient
*/
class patient
{
	protected $name,$contact,$vdate,$issue,$diag,$pres;
	
		/**
	* The constructor selects the appropriate function based on the number of
	* arguments and calls the appropriate protected function.
	*/
	public function __construct()
	{
		$a = func_get_args();
		$i = func_num_args(); 
		if($i==6)
			call_user_func_array(array($this,'create'),$a);
	}

	public function __destruct() { }
	
	protected function create($name,$contact,$vdate,$issue,$diag,$pres)
	{
		$this->name=pg_escape_string($name);
		$this->contact=pg_escape_string($contact);
		$this->vdate=pg_escape_string($vdate);
		$this->issue=pg_escape_string($issue);
		$this->diag=pg_escape_string($diag);
		$this->pres=pg_escape_string($pres);
		$sql="Insert into pat (name,contact,vdate,issue,diag,pres) values ('".$this->name."','".$this->contact."','".$this->vdate."','".$this->issue."','".$this->diag."','".$this->pres."')";
		$new=dbquery($sql);
	}
	/**
	* function for search by name or contact
	*/
	public function search($search)
	{
		$sql="select * from pat where name='$search' or contact = '$search'";
		return resource2array(dbquery($sql));
	}

	/**
	* function for search by date
	*/
	public function searchDate($search)
	{
		$sql="select * from pat where vdate='$search'";
		return resource2array(dbquery($sql));
	}
	/**
	* function for updating the patient results taking 6 arguments and update the resulte by searching for patitent id (Pid)
	*/
	public function update($name,$contact,$vdate,$issue,$diag,$pres,$pid)
	{
		$name=pg_escape_string($name);
		$contact=pg_escape_string($contact);
		$vdate=pg_escape_string($vdate);
		$issue=pg_escape_string($issue);
		$diag=pg_escape_string($diag);
		$pres=pg_escape_string($pres);
		$pid=pg_escape_string($pid);
		$sql="update pat set name ='".$name."',contact='".$contact."',vdate='".$vdate."',issue='".$issue."',diag='".$diag."',pres='".$pres."' where auto = '".$pid."'";
		dbquery($sql);
	}
	
}
#$temp1=new patient();
##	$temp1->update('ranjeet','5555','2012-04-08','blah','blah','blah',3);
#$temp1->search('saurabh1');
?>
