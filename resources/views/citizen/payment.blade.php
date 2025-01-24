@extends("layouts/layout")

@section('content')

<script src="https://cdn.kkiapay.me/k.js"></script>
<script>


    openKkiapayWidget({
    amount:"{{$amount}}",
    position:"center",
    callback:"",
    data:"",
    theme:"green",
    key:"aed9fcb0652d11efbf02478c5adba4b8",
    sandbox : true})
    
    addSuccessListener( response => {
        document.location.href="{{$redirectionUrl}}"+response.transactionId
    });
    addErrorListener( response => {
        console.log(response);
    });

</script>

@endsection