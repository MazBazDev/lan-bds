<div class="form-group">
    <textarea name="{{ $name }}" id="quillHiddenArea-{{ $name }}" hidden></textarea>
    <div id="quillEditor-{{ $name }}" style="min-height: 150px;" class="mb-3">
        {!! $description !!}
    </div>
</div>



@push('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush

@push('footer-scripts')
    <script>
        var options = {
            theme: 'snow',
            modules : {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [ 'link', 'image'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                ],
            }
        };

        new Quill('#quillEditor-{{ $name }}', options);

        $(document).ready(function(){
            $("#{{ $name }}").on("submit", function () {
                var hvalue = $('#quillEditor-{{ $name }} > .ql-editor').html();
                $("#quillHiddenArea-{{ $name }}").val(hvalue);
            });
        });
    </script>
@endpush