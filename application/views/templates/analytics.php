<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-159405984-1"></script>
<script>
    let host = window.location.hostname;
    if(host !== "localhost"){
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-159405984-1');
    }
    else{
        console.warn("[!] Google analytics blocked on localhost");
    }
</script>