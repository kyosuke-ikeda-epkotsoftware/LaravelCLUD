@if (isset($session))
<div class="alert alert-{{ $type }}">
    {{ $session }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<script>
    // クローズボタンをクリックしてメッセージを非表示にする処理
    document.addEventListener('DOMContentLoaded', function () {
        var closeButtons = document.querySelectorAll('.close');
        closeButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                this.closest('.alert').style.display = 'none';
            });
        });
    });
</script>