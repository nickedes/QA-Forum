<html>
<head>
    <h1>Welcome to the Forum</h1>
</head>

<body>
    <?php
        echo "Welcome ".$this->session->userdata['name'];
        $this->load->library('form_validation');
        echo validation_errors(); 
        echo form_open('home/butn_redirection');
    ?>

    <button name="submitform" value="logout">LOGOUT</button>
    <button name="submitform" value="edit">Edit Profile</button>
    <button name="submitform" value="question">Ask a Question</button>
    
    <h2>Recent Questions</h2>

    <?php
    foreach($rec_questions as $rec_question) {

        $q_id = $rec_question['q_id'];
        $userid = $rec_question['user_id'];
        $userlink = site_url('profile/get/'.$userid);
        $ques_link= site_url('question/get/'.$q_id);

        // question detail page link with question title
        echo "<a href='$ques_link'>"."<strong>Title : ".$rec_question['title']."</strong><br></a>";
        echo "Description : ".$rec_question['description']."<br>";
        echo "Creation time: ".$rec_question['creation_time']."<br>";

        // user linked with his profile page
        echo "Asked by : <a href='$userlink'>".$ques_user_details[$q_id]['name']."</a><br>";
        echo "Tags :";
        foreach ($ques_tags[$q_id] as $tag) {
            $tag_link = site_url('/tag/get/'.$tag);
            echo "<a href='$tag_link'>".$tag_details[$tag]."</a><br>";
        }
        if(!isset($answers[$q_id]))
            echo "Answers(0)<br><br><br>";
        else
            echo "Answers(".$answers[$q_id].")<br><br><br>";
    }
   echo $this->pagingclass->paginglink($rec_query,$rec_record_per_page);


    ?>

    <h2>My Interests</h2>
    <?php
    foreach($int_questions as $int_question) {
       $q_id = $int_question['q_id'];
       // $tagid = $int_question['tag_id'];
       // $link1=  site_url('tag/get/'.$tagid);
       $link= site_url('question/get/'.$q_id);
       echo "<a href='$link'>"."<strong>Title : ".$int_question['title']."</strong><br></a>";
       echo "Description : ".$int_question['description']."<br>";
       echo "Creation time: ".$int_question['creation_time']."<br>";
       // echo "Asked by : ".$int_question['username']."<br>";
       // echo "Tag : <a href='$link1'>".$int_question['tagname']."</a><br>";
       echo "Tags :";
        foreach ($ques_tags[$q_id] as $tag) {
            $tag_link = site_url('/tag/get/'.$tag);
            echo "<a href='$tag_link'>".$tag_details[$tag]."</a><br>";
        }
       if(!isset($answers[$q_id]))
            echo "Answers(0)<br><br><br>";
        else
            echo "Answers(".$answers[$q_id].")<br><br><br>";
    }
    echo $this->pagingclass->paginglink($int_query,$int_record_per_page)."<br><br><br><br>";

    ?>
</body>
</html>