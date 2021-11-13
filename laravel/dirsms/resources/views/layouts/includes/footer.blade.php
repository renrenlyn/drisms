
<footer>
    <p class="text-right">&copy; {{ date("Y") }}  {{ env("APP_NAME") }}. All Rights Reserved.</p>
</footer>

<script src="{{ asset('js/components/popper.min.js') }}"></script>
<script src="{{ asset('js/components/jquery-3.3.1.min.js') }}"></script>  
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('libs/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script> 

<script src="{{  asset('libs/dropify/js/dropify.min.js') }}"></script> 
<script src="{{ asset('js/components/simcify.min.js') }}"></script> 
<script src="{{ asset('js/components/app.js') }}"></script> 







<script> 
        $(document).ready(function(){
            // $('.logout-form_').on('click touchstart', function(e){
            //     e.preventDefault();   
            //     var data = $(this).attr('rel');   
            //     $('#'+data).submit(); 
            // });
 

            // $('a.notification-update').on('click touchstart', function(e){
            //     e.preventDefault(); 
            //     var data = $(this).attr('rel'); 
            //     $('#'+data).submit(); 
            // });

            function loadlink(){ 
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    } 
                });
                $.ajax({
                    url: "{{ url('/admin/notify/') }}",
                    method: 'post',
                    timeout:3000,
                    data: {
                        _token: '{{csrf_token()}}' 
                    },
                    success: function(result){

                        if(result.notifify == ""){
                            $('#notification').addClass('d-none');
                        }else{ 
                            $('#notification').removeClass('d-none');
                            $('#notification').html(result.notifify);
                        }
                    }
                }); 
            } 
  
            loadlink(); // This will run on page load
            setInterval(function(){
                loadlink() // this will run after every 5 seconds
            }, 3000);

        });

</script>