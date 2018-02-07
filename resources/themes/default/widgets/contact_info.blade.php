<section>
    <header class="major">
        <h2>Contact Information</h2>
    </header>
    @isset($contact_desc)
        <p>
            {{ $contact_desc }}
        </p>
    @endisset
    <ul class="contact">
        @isset($contact_email)
            <li class="fa-envelope-o"><a href="#">{{ $contact_email }}</a></li>
        @endisset
        @isset($contact_phone)
            <li class="fa-phone">{{ $contact_phone }}</li>
        @endisset
        @isset($contact_adress)
            <li class="fa-home">{{ $contact_adress }}</li>
        @endisset
    </ul>
</section>