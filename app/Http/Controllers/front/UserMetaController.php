<?php

namespace App\Http\Controllers\front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserMeta;
use Auth;

class UserMetaController extends Controller
{
    
    function __construct(){
    	$this->middleware('auth');
    }

    public function interest(Request $request)
    {
    	

    	if (!empty($request->tv_show)) {
    		$metaTv=UserMeta::where('user_id',Auth::user()->id)
    		->where('meta_type','interest')
    		->where('meta_key','tv_shows')
    		->first();
    		if (is_null($metaTv)) {
    			$insertTv            =new UserMeta();
    			$insertTv->user_id   =Auth::user()->id;
    			$insertTv->meta_type ='interest';
    			$insertTv->meta_key  ='tv_shows';
    			$insertTv->meta_value=$request->input('tv_show');
    			$insertTv->save();

    		}else{

    			$metaTv->meta_value=$request->input('tv_show');
    			$metaTv->save();
    		}
    	}

    	if (!empty($request->brand_artist)) {
    		$metaArtist=UserMeta::where('user_id',Auth::user()->id)
    		->where('meta_type','interest')
    		->where('meta_key','brand_artist')
    		->first();

    		if (is_null($metaArtist)) {
    			$insertArtist            =new UserMeta();
    			$insertArtist->user_id   =Auth::user()->id;
    			$insertArtist->meta_type ='interest';
    			$insertArtist->meta_key  ='brand_artist';
    			$insertArtist->meta_value=$request->input('brand_artist');
    			$insertArtist->save();
    		}else{
    			$metaArtist->meta_value=$request->input('brand_artist');
    			$metaArtist->save();
    		}
    		
    	}

    	 if (!empty($request->movie)) {
    		$metaMovie=UserMeta::where('user_id',Auth::user()->id)
    		->where('meta_type','interest')
    		->where('meta_key','movies')
    		->first();
    		if (is_null($metaMovie)) {
    			$insertMovie            =new UserMeta();
    			$insertMovie->user_id   =Auth::user()->id;
    		    $insertMovie->meta_type ='interest';
    		    $insertMovie->meta_key  ='movies';
    		    $insertMovie->meta_value=$request->input('movie');
    		    $insertMovie->save();
    		}else{
    			$metaMovie->meta_value=$request->input('movie');
    			$metaMovie->save();
    		}
    	}

    	if (!empty($request->book)) {
    		$metaBook=UserMeta::where('user_id',Auth::user()->id)
    		->where('meta_type','interest')
    		->where('meta_key','books')
    		->first();
    		if (is_null($metaBook)) {

    			$insertBook           =new UserMeta();
    			$insertBook->user_id   =Auth::user()->id;
    			$insertBook->meta_type ='interest';
    			$insertBook->meta_key  ='books';
    			$insertBook->meta_value=$request->input('book');
    			$insertBook->save();
    		}else{
    			$metaBook->meta_value=$request->input('book');
    			$metaBook->save();
    		}

    	}

    	if (!empty($request->game)) {
    		$metaGame=UserMeta::where('user_id',Auth::user()->id)
    		->where('meta_type','interest')
    		->where('meta_key','games')
    		->first();
    		if (is_null($metaGame)) {
    			$insertGame           =new UserMeta;
    			$insertGame->user_id   =Auth::user()->id;
    			$insertGame->meta_type ='interest';
    			$insertGame->meta_key  ='games';
    			$insertGame->meta_value=$request->input('game');
    			$insertGame->save();
    		}
    		$metaGame->meta_value=$request->input('game');
    		$metaGame->save();
    	}

    	if (!empty($request->hobby)) {
    		$metaHobby=UserMeta::where('user_id',Auth::user()->id)
    		->where('meta_type','interest')
    		->where('meta_key','hobbies')
    		->first();
    		if (is_null($metaHobby)) {
    			$insertHobby=new UserMeta();
    			$insertHobby->user_id   =Auth::user()->id;
    			$insertHobby->meta_type ='interest';
    			$insertHobby->meta_key  ='hobbies';
    			$insertHobby->meta_value=$request->input('hobby');
    			$insertHobby->save();
    		}else{
    			$metaHobby->meta_value=$request->input('hobby');
    			$metaHobby->save();
    		}
    	}

      $msg=['status'=>'success','message'=>'Successfully updated interests'];
       return json_encode($msg);
    }


    public function socialForm(){
        return view('pages.profile.profile_social');
    }

    public function sociaStore(Request $request){
        

        if (!empty($request->facebook)) {
            $facebookLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','facebook')
            ->first();
            if (is_null($facebookLink)) {
                $insertFacebook      =new UserMeta();
                $insertFacebook->user_id   =Auth::user()->id;
                $insertFacebook->meta_type ='social';
                $insertFacebook->meta_key  ='facebook';
                $insertFacebook->meta_value=$request->input('facebook');
                $insertFacebook->save();

            }else{

                $facebookLink->meta_value=$request->input('facebook');
                $facebookLink->save();
            }
        }

         if (!empty($request->twitter)) {
            $twitterLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','twitter')
            ->first();
            if (is_null($twitterLink)) {
                $insertTwitter           =new UserMeta();
                $insertTwitter->user_id   =Auth::user()->id;
                $insertTwitter->meta_type ='social';
                $insertTwitter->meta_key  ='twitter';
                $insertTwitter->meta_value=$request->input('twitter');
                $insertTwitter->save();

            }else{

                $twitterLink->meta_value=$request->input('twitter');
                $twitterLink->save();
            }
        }


         if (!empty($request->instagram)) {
            $instagramLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','instagram')
            ->first();
            if (is_null($instagramLink)) {
                $insertInstagram            =new UserMeta();
                $insertInstagram->user_id   =Auth::user()->id;
                $insertInstagram->meta_type ='social';
                $insertInstagram->meta_key  ='instagram';
                $insertInstagram->meta_value=$request->input('instagram');
                $insertInstagram->save();

            }else{

                $instagramLink->meta_value=$request->input('instagram');
                $instagramLink->save();
            }
        }


           if (!empty($request->twitch)) {
            $twitchLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','twitch')
            ->first();
            if (is_null($twitchLink)) {
                $insertTwitch            =new UserMeta();
                $insertTwitch->user_id   =Auth::user()->id;
                $insertTwitch->meta_type ='social';
                $insertTwitch->meta_key  ='twitch';
                $insertTwitch->meta_value=$request->input('twitch');
                $insertTwitch->save();

            }else{

                $twitchLink->meta_value=$request->input('twitch');
                $twitchLink->save();
            }
        }

          if (!empty($request->googleplus)) {
            $googleplusLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','googleplus')
            ->first();
            if (is_null($googleplusLink)) {
                $insertGooglePlus           =new UserMeta();
                $insertGooglePlus->user_id   =Auth::user()->id;
                $insertGooglePlus->meta_type ='social';
                $insertGooglePlus->meta_key  ='googleplus';
                $insertGooglePlus->meta_value=$request->input('googleplus');
                $insertGooglePlus->save();

            }else{

                $googleplusLink->meta_value=$request->input('googleplus');
                $googleplusLink->save();
            }
        }


          if (!empty($request->youtube)) {
            $youtubeLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','youtube')
            ->first();
            if (is_null($youtubeLink)) {
                $insertYoutube            =new UserMeta();
                $insertYoutube->user_id   =Auth::user()->id;
                $insertYoutube->meta_type ='social';
                $insertYoutube->meta_key  ='youtube';
                $insertYoutube->meta_value=$request->input('youtube');
                $insertYoutube->save();

            }else{

                $youtubeLink->meta_value=$request->input('youtube');
                $youtubeLink->save();
            }
        }


         if (!empty($request->patreon)) {
            $patreonLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','patreon')
            ->first();
            if (is_null($patreonLink)) {
                $insertPatreon            =new UserMeta();
                $insertPatreon->user_id   =Auth::user()->id;
                $insertPatreon->meta_type ='social';
                $insertPatreon->meta_key  ='patreon';
                $insertPatreon->meta_value=$request->input('patreon');
                $insertPatreon->save();

            }else{
                $patreonLink->meta_value=$request->input('patreon');
                $patreonLink->save();
            }
        }


        if (!empty($request->discord)) {
            $discordLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','discord')
            ->first();
            if (is_null($discordLink)) {
                $insertDiscord            =new UserMeta();
                $insertDiscord->user_id   =Auth::user()->id;
                $insertDiscord->meta_type ='social';
                $insertDiscord->meta_key  ='discord';
                $insertDiscord->meta_value=$request->input('discord');
                $insertDiscord->save();

            }else{
                $discordLink->meta_value=$request->input('discord');
                $discordLink->save();
            }
        }


        if (!empty($request->deviantart)) {
            $deviantartLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','deviantart')
            ->first();
            if (is_null($deviantartLink)) {
                $insertDeviantart            =new UserMeta();
                $insertDeviantart->user_id   =Auth::user()->id;
                $insertDeviantart->meta_type ='social';
                $insertDeviantart->meta_key  ='deviantart';
                $insertDeviantart->meta_value=$request->input('deviantart');
                $insertDeviantart->save();

            }else{
                $deviantartLink->meta_value=$request->input('deviantart');
                $deviantartLink->save();
            }
        }

        if (!empty($request->behance)) {
            $behanceLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','behance')
            ->first();
            if (is_null($behanceLink)) {
                $insertBehance            =new UserMeta();
                $insertBehance->user_id   =Auth::user()->id;
                $insertBehance->meta_type ='social';
                $insertBehance->meta_key  ='behance';
                $insertBehance->meta_value=$request->input('behance');
                $insertBehance->save();

            }else{
                $behanceLink->meta_value=$request->input('behance');
                $behanceLink->save();
            }
        }


        if (!empty($request->dribbble)) {
            $dribbbleLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','dribbble')
            ->first();
            if (is_null($dribbbleLink)) {
                $insertDribbble            =new UserMeta();
                $insertDribbble->user_id   =Auth::user()->id;
                $insertDribbble->meta_type ='social';
                $insertDribbble->meta_key  ='dribbble';
                $insertDribbble->meta_value=$request->input('dribbble');
                $insertDribbble->save();

            }else{
                $dribbbleLink->meta_value=$request->input('dribbble');
                $dribbbleLink->save();
            }
        }

          if (!empty($request->artstation)) {
            $artstationLink=UserMeta::where('user_id',Auth::user()->id)
            ->where('meta_type','social')
            ->where('meta_key','artstation')
            ->first();
            if (is_null($artstationLink)) {
                $insertArtstation            =new UserMeta();
                $insertArtstation->user_id   =Auth::user()->id;
                $insertArtstation->meta_type ='social';
                $insertArtstation->meta_key  ='artstation';
                $insertArtstation->meta_value=$request->input('artstation');
                $insertArtstation->save();

            }else{
                $artstationLink->meta_value=$request->input('artstation');
                $artstationLink->save();
            }
        }


      $msg=['status'=>'success','message'=>'Successfully updated interests'];
       return json_encode($msg);

    }



}
