  <script>// toster
      @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
            case 'info':
                 toastr.info("{{ Session::get('messege') }}");
                 break;
            case 'success':
                toastr.success("{{ Session::get('messege') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('messege') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('messege') }}");
                break;
        }
      @endif
</script>


 <script>  
     $(document).on("click", "#deleteitem", function(e){
         e.preventDefault();
         var link = $(this).attr("href");
            swal({
              title: "Are you Want to delete?",
              text: "Once Delete, This will be Permanently Delete!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                   window.location.href = link;
              } else {
                swal("Safe Data!");
              }
            });
        });
</script>