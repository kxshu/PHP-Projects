<?php

function getProjects($id){
	$Tasks = D('Tasks');
        //$Projects = M('Projects');
        //$Users_Projects = M('Users_Projects');
        
        $Projects = $User->relation(true)->find($id);
        //$Tasks = $Tasks->where('ProjectID='.$MembersID)->select();
        //$Projects = $Projects->where('MembersID='.$MembersID)->select();
        

        if($Projects){
           return $Projects;
            
        }else{
           echo 'error!';
        }
}

function getTasks(){

}