    
    var accessToken;
    var user;
    
    // For testing...
    //localStorage["fb_share_disabled_until"] = 0;
    
    /*
    *
    *   Facebook SDK Methods 
    *
    */
  
    window.fbAsyncInit = function() {
    
      // Parse service used for contests
      Parse.initialize("3kiEvK7WgtasQ5dcI7dr62jR6haBd7G7tqMZUyrP", 
        "ardQTVyvt2MUnUsC5l0yIVPNiCEpLGIWqmEW8fg0");
    
      FB.init({
        appId      : '351008055042669',
        status     : true,
        cookie     : true,
        xfbml      : true
      });
      
      FB.getLoginStatus(function(response) {
        if (response.status === 'connected') {
          var uid = response.authResponse.userID;
          accessToken = response.authResponse.accessToken;
          loggedIn();
          showFbShareDialog(accessToken);
        } else if (response.status === 'not_authorized') {
          loggedOut();
          showFbConnectLogin();
        } else {
          loggedOut();
          showFbConnectLogin();
        }
      });
  
      FB.Event.subscribe('auth.authResponseChange', function(response) {
        if (response.status === 'connected') {
          console.log("connected");
          testAPI();
        } else if (response.status === 'not_authorized') {
          console.log("not authorized");
          loggedOut();
        } else {
          console.log("unknown: " + response.status);
          loggedOut();
        }
      });
    };
    
    // Load the Facebook SDK asynchronously
    (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
    }(document));
    
        
    /*
    *
    *   MGROWTH Facebook Methods 
    *
    */
     
    function loggedOut() {
      $(".logged_out").show();
      $(".logged_in").hide();
    } 
    
    function loggedIn() {
      $(".logged_out").hide();
      $(".logged_in").show();
    } 
    
    function showContestEntry() {
      $("#contest").show();
      $("#fade").show();
    }

    function testAPI() {
      console.log('Fetching information.... ');
      FB.api('/me', function(response) {
        loggedIn();
        console.log(response);
        user = response;
        $(".fb_name").html(response.name); // Set the user's name
      });
    }
    
    function shareTheme() {
      FB.ui({
        method: 'feed',
        link: 'https://gallery.mgrowth.com/en-US/theme/christmas2013',
        caption: 'MGROWTH - Christmas 2013',
      }, function(response){});
    }
    
    function showShareDialog(token) {
      
      FB.ui({
        method: 'feed',
        name: 'I entered to WIN an Amazon Gift Card up to $100!  Check it out!',
        display: 'iframe',
        description: (
          'Some text goes here'
        ),
        ref : 'theme,xmasgold,anniv_cntst',
        link: 'https://apps.facebook.com/mgrowth/',
        picture: 'https://'
      }, function(response) {
        if (response && response.post_id) {
          FB.api('/me', function(response) {
            console.log("Registering: " + response.email);
            var ContestObject = Parse.Object.extend("AnniversaryContest");
            var contestObj = new ContestObject();
            contestObj.set('emailAddress', response.email);
            contestObj.set('location', response.location.name);
            contestObj.set('gender', response.gender);
            contestObj.set('birthday', response.birthday);
            contestObj.save(null, {
              success: function(entry) {
                console.log('New object created with objectId: ' + entry.id);
              },
              error: function(entry, error) {
                console.log('Failed to create new object, with error code: ' + error.description);
              }
            });
            
          });
        } else {
          console.log('Post was not published. Dialog paused for 24 hours!'); 
        }
        
        // Regardless of the choice...hide it for 24 hours
        var d = new Date();
        var now = d.getTime();
        var timeout = now + TWENTY_FOUR_HOURS_MILLIS;
        localStorage["fb_share_disabled_until"] = timeout;
      
      });
    }
    
    function registerUserForContest(user) {
      var Contest = Parse.Object.extend("AnniversaryContest");
      var query = new Parse.Query(Contest);
      query.equalTo("user", user);
      query.find({
        success: function(results) {
          alert("Successfully retrieved " + results.length + " scores.");
        },
        error: function(error) {
          alert("Error: " + error.code + " " + error.message);
        }
      });
    }
    
    function showFbConnectLogin() {
    
      // If localstorage is available
      if (typeof(localStorage) !== "undefined") {
          
        // Retrieve disabled date
        fb_login_disabled_until = localStorage["fb_login_disabled_until"];  
        now_seconds = d.getTime(); // Get now (in secs)
        
        if(localStorage["fb_login_disabled_until"] === null || 
          typeof(localStorage["fb_login_disabled_until"]) === "undefined" || 
          typeof(fb_login_disabled_until) === "undefined" ||
          now_seconds >= fb_login_disabled_until) 
        {
          localStorage["fb_login_disabled_until"] = 0; // Reset
          $("#fb_connect").show();
          $("#fade").show();
        } else {
          $("#fb_connect").hide();
          $("#fade").fadeOut();
        }
      } else {
        $("#fb_connect").show();
        $("#fade").show();
      }
    }
    
    function showFbShareDialog(accessToken) {
    
      // If localstorage is available
      if (typeof(localStorage) !== "undefined") {
          
        // Retrieve disabled date
        fb_share_disabled_until = localStorage["fb_share_disabled_until"];  
        now_seconds = d.getTime(); // Get now (in secs)
        
        if(localStorage["fb_share_disabled_until"] === null || 
          typeof(localStorage["fb_share_disabled_until"]) === "undefined" || 
          typeof(fb_share_disabled_until) === "undefined" ||
          now_seconds >= fb_share_disabled_until) 
        {
          localStorage["fb_share_disabled_until"] = 0; // Reset
          //showShareDialog(accessToken);
          showContestEntry(accessToken);
        } else {
          console.log("Share dialog disabled");
        }
      }
    }
    