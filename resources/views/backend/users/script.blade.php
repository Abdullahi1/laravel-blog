@section('script')
    <script type="text/javascript">
        $('#name').on('keyup',function () {
            let theName = this.value.toLowerCase().trim(),
                sluginput = $('#slug'),
                theSlug = theName.replace(/&/g,'-and-')
                    .replace(/[^a-z0-9-]+/g,'-')
                    .replace(/\-\-+/g,'-')
                    .replace(/^-+|-+$/g,'')
            ;

            sluginput.val(theSlug);
        })
        //let simplemde1 = new SimpleMDE({element: $('#excerpt')[0]});
        let simplemde2 = new SimpleMDE({element: $('#bio')[0]});
        $(function () {
            $('#datetimepicker1').datetimepicker({
                format: 'YYYY-MM-DD HH:mm:ss',
                showClear: true,
            });
        });

        $('#draft-btn').click(function(e) {
            e.preventDefault();
            // $('#published_at').val("");
            $('#post-form').submit();
        });


    </script>
@endsection