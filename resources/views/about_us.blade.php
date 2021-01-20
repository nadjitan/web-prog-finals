@extends('layouts.app')

@section('pageTitle', '- About Us')

@section('content')
    <div class="main-body about-us" style="margin-top: 240px;">
        <h1>About Us</h1>

        <div class="container-about-us">
            <div class="au-tabs">
                <a class="btn-about-agila">
                    About Agila
                </a>
                <a class="btn-about-the-creators">
                    About The Creators
                </a>
            </div>

            <div class="au-body">
                <div class="au-paragraph">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam varius enim vel feugiat rutrum. 
                    Duis non massa nisl. Nulla condimentum elementum nisi vitae euismod. Aenean aliquet 
                    mollis orci, a porttitor odio hendrerit non. Phasellus mollis ipsum vitae urna imperdiet, eu convallis 
                    mi sollicitudin. Maecenas elementum mi a urna tempor, vitae tincidunt eros pretium. Class aptent taciti 
                    sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Morbi placerat,
                    eros sit amet bibendum suscipit, dui nibh rhoncus lacus, a rutrum est eros non mauris.
                    
                    Curabitur hendrerit nisi et eros rhoncus tincidunt. Donec mollis efficitur nisl. Suspendisse vel magna 
                    dolor. Sed ut porttitor lacus, a accumsan sapien. Integer metus lorem, egestas sit amet dui in, rutrum 
                    vestibulum dui.
                </div>

                <div class="au-creators"">
                    <div>
                        <img src="{{ asset('img/Nadji@2x.png') }}" alt="">

                        <div>
                            <p>Nadji Roi R. Tan</p>
                            <p>Co-Founder / Programmer / Designer</p>
                        </div>
                    </div>

                    <div>
                        <img src="{{ asset('img/Matt@2x.png') }}" alt="">

                        <div>
                            <p>Matthew Gabriel G. Ocampo</p>
                            <p>Co-Founder / Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="socials-about-us">
            <img src="{{ asset('img/Vertical-white.svg') }}" alt="Agila logo" />
            <img src="{{ asset('img/Social Media Icons.svg') }}" alt="Social media links" />
        </div>
    </div>
@endsection