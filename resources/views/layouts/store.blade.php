@extends('layouts.app')

@section('pageTitle', '- Store')

@section('content')
    <div class="store-search">
        <input
            type="text"
            id="input-search"
            name="input-search"
            placeholder="Search"
        />
        <div class="icon icon-search"></div>
    </div>

    @if ($errors->any())
        <div class="text-alert" style="display: grid; align-content: center; justify-content: center; margin-top: 30px; height: fit-content; width: fit-content; background-color: white; border-radius: 20px; padding: 20px; font-weight: bold;">
        Booking error. Please fill every field.
        </div>
    @endif

    <div class="container-store">
        @if ($places->count())
            @foreach ($places as $place)
                <div class="container-store-item">
                    <div class="store-item-column">
                        <div>
                            <h4>{{ $place->origin }}</h4>
                            <p>{{ $place->origin_short }}</p>
                        </div>
                        
                        <img src="{{ asset('img/airplane.svg') }}" alt="">
                        
                        <div>
                            <h4>{{ $place->destination }}</h4>
                            <p>{{ $place->destination_short }}</p>
                        </div>
        
                        <div>₱ {{ number_format($place->price, 2, '.', ',') }}</div>
                    </div>
                    <div class="store-item-book">                 
                        <button class="btn btn-book open-modal-book" data-id="{{ $place->id }}">BOOK</button>
                    </div>
                </div>
            @endforeach
        @else
            <div style="color: white; font-size: 2rem;">
                There are no places to book
            </div>   
        @endif
        
    </div>

    <div class="container-bg"></div>
    <div class="container-modal">
        <div class="modal-body">
            <div class="modal-header">
                <div class="icon-exit exit-modal-book"></div>
            </div>

            <div class="modal-content">
                <div class="container-steps">
                    <div class="circle-1">1</div>
                    <div class="circle-divider circle-divider-2"></div>
                    <div class="circle-2">2</div>
                    <div class="circle-divider circle-divider-3"></div>
                    <div class="circle-3">3</div>
                </div>

                <form action="{{ route('store') }}" method="POST">
                    <!-- STEP 1 -->
                    <div class="container-container">
                        @csrf
                        <div class="container-input">
                            <div class="validation">
                                <div>
                                    <h4>ORIGIN</h4>
                                    <p class="show-origin"></p>
                                    <input type="hidden" value="" name="origin">
                                </div>

                                <div>
                                    <h4>DESTINATION</h4>
                                    <p class="show-destination"></p>
                                    <input type="hidden" value="" name="destination">
                                </div>

                                <div>
                                    <h4>PRICE</h4>
                                    <p class="show-price"></p>
                                    <input type="hidden" value="" name="price">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2 -->
                    <div class="container-container">
                        <div class="container-input">
                            <div>
                                <label for="input-full-name">Full Name</label>
                                <input
                                type="text"
                                class="input"
                                id="input-full-name"
                                name="full_name"
                                placeholder="e.g. Nadji Roi R. Tan"
                                value="{{ old('full_name') }}"
                                />
                            </div>

                            <div class="input-2">
                                <div>
                                    <input type="hidden" value="" name="nationality">
                                    <input type="checkbox" id="nationality-toggle" />
                                    <label class="label-nationality">Nationality</label>
                                    <label for="nationality-toggle">
                                        <div class="input input-dropdown" id="nationality-element" >
                                            Select
                                            <div class="icon-expand"></div>
                                            </div>
                                            <div class="dropdown">
                                            <div class="dropdown-item">Filipino</div>
                                            <div class="dropdown-item">American</div>
                                            <div class="dropdown-item">Japanese</div>
                                        </div>
                                    </label>
                                </div>

                                <div>
                                    <input type="hidden" value="" name="gender">
                                    <input type="checkbox" id="gender-toggle" />
                                    <label class="label-gender">Gender</label>
                                    <label for="gender-toggle">
                                        <div class="input input-dropdown" id="gender-element">
                                            Select
                                            <div class="icon-expand"></div>
                                        </div>
                                        <div class="dropdown">
                                            <div class="dropdown-item">Male</div>
                                            <div class="dropdown-item">Female</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="input-full-name">Passport number</label>
                                <input
                                type="text"
                                class="input"
                                id="input-pass-number"
                                name="passport_number"
                                placeholder="Passport number..."
                                value="{{ old('passport_number') }}"
                                />
                            </div>
                        </div>

                        <div class="container-input">
                            <div>
                                <label for="input-full-surname">Surname</label>
                                <input
                                type="text"
                                class="input"
                                id="input-full-surname"
                                name="surname"
                                placeholder="e.g. Tan"
                                value="{{ old('surname') }}"
                                />
                            </div>

                            <div>
                                <input type="hidden" value="" name="date_of_birth">
                                <label for="container-date-DB">Date Of Birth</label>
                                <div class="container-date-DB">
                                    <input
                                        type="number"
                                        class="input input-day-DB"
                                        id="input-day-DB"
                                        name="input-day-DB"
                                        max="31"
                                        min="1"
                                        onKeyPress="if(this.value.length==2) return false;"
                                        placeholder="DD"
                                    />

                                    <div>
                                        <input type="checkbox" id="DB-month-toggle" />
                                        <label for="DB-month-toggle">
                                            <div class="input input-dropdown input-month-DB" id="db-month-element">
                                                Month
                                                <div class="icon-expand"></div>
                                            </div>
                                            <div class="dropdown">
                                                <div class="dropdown-item">January</div>
                                                <div class="dropdown-item">February</div>
                                                <div class="dropdown-item">March</div>
                                                <div class="dropdown-item">April</div>
                                                <div class="dropdown-item">May</div>
                                                <div class="dropdown-item">June</div>
                                                <div class="dropdown-item">July</div>
                                                <div class="dropdown-item">August</div>
                                                <div class="dropdown-item">September</div>
                                                <div class="dropdown-item">October</div>
                                                <div class="dropdown-item">November</div>
                                                <div class="dropdown-item">December</div>
                                            </div>
                                        </label>
                                    </div>

                                    <input
                                        type="number"
                                        class="input input-year-DB"
                                        id="input-year-DB"
                                        name="input-year-DB"
                                        max="2010"
                                        min="1920"
                                        onKeyPress="if(this.value.length==4) return false;"
                                        placeholder="YYYY"
                                    />
                                </div>
                            </div>

                            <div>
                                <input type="hidden" value="" name="passport_expiry_date">
                                <label for="container-date-PI">Passport expiry date</label>
                                <div class="container-date-PI">
                                    <input
                                        type="number"
                                        class="input input-day-PI"
                                        id="input-day-PI"
                                        name="input-day-PI"
                                        max="31"
                                        min="1"
                                        onKeyPress="if(this.value.length==2) return false;"
                                        placeholder="DD"
                                    />

                                    <div>
                                        <input type="checkbox" id="PI-month-toggle" />
                                        <label for="PI-month-toggle">
                                            <div class="input input-dropdown input-month-PI" id="pi-month-element">
                                                Month
                                                <div class="icon-expand"></div>
                                            </div>
                                            <div class="dropdown">
                                                <div class="dropdown-item">January</div>
                                                <div class="dropdown-item">February</div>
                                                <div class="dropdown-item">March</div>
                                                <div class="dropdown-item">April</div>
                                                <div class="dropdown-item">May</div>
                                                <div class="dropdown-item">June</div>
                                                <div class="dropdown-item">July</div>
                                                <div class="dropdown-item">August</div>
                                                <div class="dropdown-item">September</div>
                                                <div class="dropdown-item">October</div>
                                                <div class="dropdown-item">November</div>
                                                <div class="dropdown-item">December</div>
                                            </div>
                                        </label>
                                    </div>

                                    <input
                                        type="number"
                                        class="input input-year-PI"
                                        id="input-year-PI"
                                        name="input-year-PI"
                                        max="3000"
                                        min="2022"
                                        onKeyPress="if(this.value.length==4) return false;"
                                        placeholder="YYYY"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3 -->
                    <div class="container-container">
                        <div class="container-input cards">
                            <div style="padding-left: 12px">
                                Payment Method
                            </div>
                            
                            <div>
                                <a><img src="{{ asset('img/paypal.svg') }}" alt="Paypal Brand"></a>
                                <a><img src="{{ asset('img/mastercard.svg') }}" alt="Mastercard Brand"></a>
                                <a><img src="{{ asset('img/visa.svg') }}" alt="Visa Brand"></a>
                            </div>

                            <div>
                                <label for="input-full-name">Card Holder's Name</label>
                                <input
                                type="text"
                                class="input"
                                id="input-card-holder"
                                name="input-card-holder"
                                placeholder="e.g. Nadji Tan"
                                />
                            </div>

                            <div>
                                <label for="input-full-name">Card Number</label>
                                <input
                                type="number"
                                class="input"
                                id="input-card-number"
                                name="input-card-number"
                                placeholder="0000-0000-0000-0000"
                                />
                            </div>
                        </div>

                        <div class="container-input">
                            

                            <div class="input-2 card-info">
                                <div>
                                    <input type="checkbox" id="expmonth-toggle" />
                                    <label class="label-expmonth" style="margin-left: 12px">EXP Month</label>
                                    <label for="expmonth-toggle">
                                        <div class="input input-dropdown">
                                            Select
                                            <div class="icon-expand"></div>
                                        </div>
                                        <div class="dropdown">
                                            <div class="dropdown-item">1</div>
                                            <div class="dropdown-item">2</div>
                                            <div class="dropdown-item">3</div>
                                            <div class="dropdown-item">4</div>
                                            <div class="dropdown-item">5</div>
                                            <div class="dropdown-item">6</div>
                                            <div class="dropdown-item">7</div>
                                            <div class="dropdown-item">8</div>
                                            <div class="dropdown-item">9</div>
                                            <div class="dropdown-item">10</div>
                                            <div class="dropdown-item">11</div>
                                            <div class="dropdown-item">12</div>
                                        </div>
                                    </label>
                                </div>

                                <div>
                                    <input type="checkbox" id="expyear-toggle" />
                                    <label class="label-expyear">EXP Year</label>
                                    <label for="expyear-toggle">
                                        <div class="input input-dropdown">
                                            Select
                                            <div class="icon-expand"></div>
                                        </div>
                                        <div class="dropdown">
                                            <div class="dropdown-item">22</div>
                                            <div class="dropdown-item">23</div>
                                            <div class="dropdown-item">24</div>
                                            <div class="dropdown-item">25</div>
                                            <div class="dropdown-item">26</div>
                                            <div class="dropdown-item">27</div>
                                            <div class="dropdown-item">28</div>
                                            <div class="dropdown-item">29</div>
                                            <div class="dropdown-item">30</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="input-cvc-number">CVC Number</label>
                                <input
                                type="number"
                                class="input"
                                id="input-cvc-number"
                                name="input-cvc-number"
                                placeholder="000"
                                />
                            </div>

                            <div style="width: 100%; display: grid; justify-items: center;">
                                <button type="submit" class="btn btn-book-now">BOOK FLIGHT</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="container-btn">
                    <input type="hidden" id="steps-counter" max="3" />
                    <button class="btn btn-back">BACK</button>
                    <button class="btn btn-next">NEXT</button>
                </div>
            </div>
        </div>
    </div>
@endsection