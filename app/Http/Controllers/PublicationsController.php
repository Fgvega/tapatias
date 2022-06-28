<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Publication;
use App\Http\Requests\CreatePublicationRequest;
use Illuminate\Support\Facades\Storage;

class PublicationsController extends Controller
{
	public function createPublication(){
		return view('posts.create_publication');
	}

	public function show($slug){
		$publication = DB::table('publications')->where('slug','=',$slug)->first();
		return view ('posts.publication',['publication' => $publication]);
	}

	public function store_publication(CreatePublicationRequest $request){
		$publication = new Publication;
		$i = 1;
		$imagetitle;
		while($i<=5){
			$imagetitle = "img" . $i;
			if($request->hasFile($imagetitle)){
				$filenamewithextension = $request->file($imagetitle)->getClientOriginalName();
				$filename = pathinfo($filenamewithextension,PATHINFO_FILENAME);
				$extension = $request->file($imagetitle)->getClientOriginalExtension();
				$filenametostore= $filename.'_'.uniqid().'.'.$extension;
				Storage::disk('ftp_public')->put($filenametostore,fopen($request->file($imagetitle),'r+'));
				//echo $filenamewithextension
				//echo $filename
				//echo $extension
				//echo $filenametostore
			}
			$i++;
		}
		$publications = DB::table('publications')->get();
		return view('welcome',['publications' => $publications]);
		/*
		if($request->hasFile('img1')){
			//get filename with extension
			$filenamewithextension = $request->file('img1')->getClientOriginalName();
			//get filename without extension
			$filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
			//get file extension
			$extension = $request->file('img1')->getClientOriginalExtension();
			//filename to store
			$filenametostore = $filename.'_'.uniqid().'.'.$extension;
			//Upload File to external server
			Storage::disk('ftp_public')->put($filenametostore,fopen($request->file('img1'),'r+'));
		}*/
	}

}
