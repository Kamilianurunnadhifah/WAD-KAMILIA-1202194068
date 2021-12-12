<style>

</style>

<header id="topheader" class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-center py-3 mb-4">
    <nav>
    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li>
            <a href="/" class="nav-link px-2 link-secondary fw-bold">HOME</a>
        </li>
        <li>
            <a href="/vaccine" class="nav-link px-2 link-secondary">VACCINE</a>
        </li>
        <li>
            <a href="/patient" class="nav-link px-2 link-secondary">PATIENT</a>
        </li>
    </ul>
    </nav>
</header>

<script>
$( '#topheader .nav a' ).on( 'click', function () {
	$( '#topheader .nav' ).find( 'li.fw-bold' ).removeClass( 'fw-bold' );
	$( this ).parent( 'li' ).addClass( 'fw-bold' );
});
</script>
