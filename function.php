function viewTree($user_id){
    $ref_user = User::where('referrer_id',$user_id)->get();
    foreach ($ref_user as $data){
        $cc = \App\User::where('referrer_id',$data->id)->count();
        if ($cc > 0){
            echo '<li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="#page1'.$data->id.'" aria-expanded="false" aria-controls="page1'.$data->id.'"> <i class="collapsed"><i class="fas fa-folder"></i></i><i class="expanded"><i class="far fa-folder-open"></i></i> '.$data->username.'</a></span>';
            echo '<ul>';
            echo '<div id="page1'.$data->id.'" class="collapse">';
            viewTree($data->id) ;
            echo '</div>';
            echo '</ul>';
            echo '</li>';
        }else{
            echo '<li><span><i class="far fa-file"></i> '.$data->username.'</span></li>';
        }
    }
}




 {!! viewTree(Auth::id()) !!}
