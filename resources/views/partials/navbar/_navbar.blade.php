<nav>
    <div class="flex justify-between p-6 px-10 bg-black text-white">
        <div class="">
            <p class="text-xl font-bold text-blue-500"> <a href="/" class="">Mit<span class="text-white uppercase">o</span> Blog</a></p>
        </div>
        <div class="">
            <ul class="flex space-x-4">
                <li class=""><a href="/" class="p-2  hover:text-blue-500 hover:border-b-2 <?php echo (basename($_SERVER['PHP_SELF'])=='/')?"active font-bold border-b-2 border-blue-500 pb-4":"" ?>">Accueil</a></li>
                <li class=""><a href="about" class=" p-2  hover:text-blue-500 hover:border-b-2">à propos</a></li>
            </ul>
        </div>
    </div>
</nav>