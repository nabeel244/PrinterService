<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script>
    let Tabs = document.querySelectorAll('.Tab');
    let TabContents = document.querySelectorAll('.TabContent');
    const showTabContent = (e, id) => {
        TabContents.forEach((TabContent) => {
            TabContent.classList.remove('js-show')
        })
        Tabs.forEach((Tab) => {
            Tab.classList.remove('active')
        })
        e.currentTarget.classList.add('active')
        let TabContentId = document.querySelector(`#${id}`)
        TabContentId.classList.add('js-show')
    }
</script>
<script>
    const showMenu = () => {
        mynavItems.classList.toggle('js-hide')
    }

    function loadUnreadNotifications() {
        $.ajax({
            type: 'GET',
            url: "{{ route('count.notification') }}",
            success: function(data) {
                console.log(data.total);
                $('#countNotification').text(data.total);
            }
        });
    };


    loadUnreadNotifications(); // This will run on page load
    setInterval(function() {
        loadUnreadNotifications() // this will run after every 5 seconds
    }, 5000);
</script>

@stack('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
</script>
