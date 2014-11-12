<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {

	// public function index(){
	// 	 $this->display('/index');
	// }

	public function Tasks($ProjectID=1,$Status=NULL){
        $UsersForm = D('Users');
        $TasksForm = D('Tasks');
        $ProjectsForm = D('Projects');
        
        
        $Projects = $UsersForm->relation(true)->find(1);

        // $Status = I('get.Status');

        $Date = I('get.Date');
        if($Date){
            $Date = substr($Date,0,10); 

            switch ($Status) {
                case '1':
                    $Tasks = $TasksForm->where('Status="进行中"  and ProjectID='.$ProjectID)->select();
                    break;
                case '2':
                    $Tasks = $TasksForm->where('Status="已中断" and ProjectID='.$ProjectID)->select();
                    //$Tasks = M()->query('select * from Tasks where Status="已中断" and ProjectID ='.$ProjectID);
                    break;
                case '3':
                    $Tasks = $TasksForm->where('Status="已完成" and ProjectID='.$ProjectID)->select();
                    break;
                default:
                    $Tasks = $TasksForm->where('CreatedTime like "%'.$Date.'%" and ProjectID='.$ProjectID)->select();
                    break;
            }

        }
        
        


        switch ($Status) {
        	case '1':
        		$Tasks = $TasksForm
                ->where('Status="进行中"  and ProjectID='.$ProjectID)
                ->alias('a')
                ->field('a.*,b.Name as Author_Name,c.Name as Owner_Name')
                ->join('Users b ON a.AuthorID = b.id')
                ->join('Users c ON a.OwnerID = c.id')
                ->select();
        		break;
        	case '2':
        		$Tasks = $TasksForm
                ->where('Status="已中断" and ProjectID='.$ProjectID)
                ->alias('a')
                ->field('a.*,b.Name as Author_Name,c.Name as Owner_Name')
                ->join('Users b ON a.AuthorID = b.id')
                ->join('Users c ON a.OwnerID = c.id')
                ->select();
        		//$Tasks = M()->query('select * from Tasks where Status="已中断" and ProjectID ='.$ProjectID);
        		break;
        	case '3':
        		$Tasks = $TasksForm
                ->where('Status="已完成" and ProjectID='.$ProjectID)
                ->alias('a')
                ->field('a.*,b.Name as Author_Name,c.Name as Owner_Name')
                ->join('Users b ON a.AuthorID = b.id')
                ->join('Users c ON a.OwnerID = c.id')
                ->select();
        		break;
        	default:
        		// $Tasks = M()
                // ->query('select a.*,b.* as b,c.* as c from Tasks as a join Users as b on a.AuthorID = b.id join Users as c on a.OwnerID = c.id where ProjectID ='.$ProjectID);
        		$Tasks = $TasksForm
                ->where('ProjectID='.$ProjectID)
                ->alias('a')
                ->field('a.*,b.Name as Author_Name,b.PhotoURL as Author_URL,c.Name as Owner_Name,c.PhotoURL as Owner_URL')
                ->join('Users b ON a.AuthorID = b.id','left')
                ->join('Users c ON a.OwnerID = c.id','left')
                ->select();
                break;
        }
        
        $ProjectItem = $ProjectsForm->where('id='.$ProjectID)->select();
        // $Author=$UsersForm->where('id='.$Tasks['AuthorID'])->select();
        // $Owner=$UsersForm->where('id='.$Tasks['OwnerID'])->select();
        

  	//      $pid_list='(';
	 // 	$str =',';	
	 // 	if(!empty($Projects['ProjectDetails'])){
		// 	foreach ($Projects['ProjectDetails'] as $v){
		// 		$str .=$v['id'].',';
		// 	}  
		// }
		// $pid_list .=trim($str,',').')';
		
		// $list = M()->query('select * from Tasks where ProjectID in'.$pid_list);

        
		


        if($Projects){
        	//var_dump($Tasks);
            $this->Status = $Status;  
            $this->Projects = $Projects;
            $this->ProjectItem = $ProjectItem;
            $this->Tasks = $Tasks;
            // $this->ajaxReturn($Tasks);
            $this->Author = $Author;
            $this->Owner = $Owner;
            $this->Now=date('Y.m.d');
            
            
        }else{
            $this->error('出错了！');
        }



        $this->display('/index');
    }

    // public function getTasks($ProjectID=1){
    	
	    

    // }




}
