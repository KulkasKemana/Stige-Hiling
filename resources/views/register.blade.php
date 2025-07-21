<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Healing Tour and Travel Login
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://fonts.googleapis.com/css2?family=Inter&amp;display=swap" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   body {
      font-family: "Inter", sans-serif;
    }
  </style>
 </head>
 <body class="bg-[#f5f5f7] min-h-screen flex items-center justify-center p-6">
  <main class="bg-white rounded-[40px] shadow-[0_0_30px_rgba(0,0,0,0.15)] max-w-5xl w-full flex flex-col md:flex-row overflow-hidden">
   <!-- Left side with image and text -->
   <section class="relative md:w-1/2 w-full rounded-t-[40px] md:rounded-l-[40px] md:rounded-tr-none overflow-hidden">
    <img alt="Group of friends traveling in forest with jeep, four people having fun outdoors" class="w-full h-full object-cover" height="800" src="https://storage.googleapis.com/a1aa/image/9f824814-4ade-4203-0737-cbd84fc6c7ba.jpg" width="600"/>
    <div class="absolute bottom-20 left-0 right-0 text-white font-semibold text-sm leading-tight drop-shadow-[0_0_3px_rgba(0,0,0,0.8)]">
     Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore mit
    </div>
      <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex justify-center space-x-2 px-4">
     <span class="w-6 sm:w-8 h-2 sm:h-3 rounded-full bg-[#3b6dfd]"></span>
     <span class="w-4 sm:w-5 h-2 sm:h-3 rounded-full bg-[#a9b3f7]"></span>
     <span class="w-4 sm:w-5 h-2 sm:h-3 rounded-full bg-[#a9b3f7]"></span>
    </div>
   </section>
   <!-- Right side with form -->
   <section class="md:w-1/2 w-full p-10 md:p-14 flex flex-col justify-center">
    <div class="flex items-center space-x-3 mb-6">
     <img alt="Healing Tour And Travel logo with black text and small orange airplane icon" class="w-10 h-10 object-contain" height="40" src="{{asset('assets/Logo_Healing_no_bg.png')}}" width="40"/>
     <div class="text-sm font-bold leading-tight">
      Healing
      <br/>
      Tour And Travel
     </div>
    </div>
    <h1 class="text-2xl font-extrabold mb-2 leading-tight">
     WELCOME TO
     <br/>
     HEALING TOUR AND TRAVEL
    </h1>
    <p class="text-sm mb-8">
     Please enter log in details below
    </p>
    <form class="w-full space-y-6">
     <input class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" placeholder="Email" required="" type="email"/>
     <div class="relative">
      <input class="w-full border border-black rounded-lg px-5 py-3 text-base placeholder-black focus:outline-none" placeholder="Password" required="" type="password"/>
      <a class="absolute right-3 top-1/2 -translate-y-1/2 text-sm text-blue-600 hover:underline" href="#">
       Forget Password?
      </a>
     </div>
     <button class="w-full bg-[#ff914d] text-white font-semibold rounded-lg py-3 text-lg hover:bg-[#ff7a1a] transition" type="submit">
      Sign In
     </button>
    </form>
    <div class="flex items-center my-6 text-sm text-black">
     <hr class="flex-grow border-t border-black"/>
     <span class="mx-3 font-medium">
      or continue
     </span>
     <hr class="flex-grow border-t border-black"/>
    </div>
    <button class="w-full flex items-center justify-center gap-3 border border-gray-300 rounded-lg py-3 shadow-sm hover:shadow-md transition" type="button">
     <img alt="Google logo icon" class="w-5 h-5 object-contain" height="20" src="{{asset('assets/LogoGoogle-removebg-preview.png')}}" width="20"/>
     Log in with Google
    </button>
    <p class="text-center mt-6 text-sm">
     Don’t have an account?
     <a class="text-blue-600 hover:underline" href="#">
      Sign Up
     </a>
    </p>
   </section>
  </main>
 </body>
</html>
