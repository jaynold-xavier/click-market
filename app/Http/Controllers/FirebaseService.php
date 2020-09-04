<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class FirebaseService
{
    private $serviceAccount, $firebase, $database;

    //$newPost->getKey(); // => -KVr5eu8gcTv7_AHb-3-
    //$newPost->getUri(); // => https://my-project.firebaseio.com/blog/posts/-KVr5eu8gcTv7_AHb-3-
    //$newPost->getChild('title')->set('Changed post title');
    //$newPost->getValue(); // Fetches the data from the realtime database
    //$newPost->remove();

    public function __construct(){
        $this->serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/photographers-list-firebase-adminsdk-mrsvt-5d00fc397f.json');
        $this->firebase = (new Factory)
        ->withServiceAccount($this->serviceAccount)
        ->withDatabaseUri('https://photographers-list.firebaseio.com/')
        ->create();
        $this->database = $this->firebase->getDatabase();
    }

    public function pushData($data){
        
        $newPost = $this->database
        ->getReference()
        ->push($data);

        return $newPost->getKey();
        
        //print_r(json_encode($newPost->getValue()));
    }

    public function retrieveData(){
        $newPost = $this->database
        ->getReference()
        ->getValue();

        return $newPost;
    }

    public function retrievePhotographer($key){
        $newPost = $this->database
        ->getReference($key)
        ->getValue();

        return $newPost;
    }

    public function deleteData($key){
        $newPost = $this->database
        ->getReference($key)
        ->remove();
    }
}
