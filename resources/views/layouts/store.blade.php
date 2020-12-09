@extends('layouts.app')

@section('content')
    <div class="container-store">
        <div class="store-search">
            <div class="icon icon-search"></div>
            <input
                type="text"
                id="input-search"
                name="input-search"
                placeholder="Search"
            />
        </div>

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
        
                        <div>₱ {{ $place->price }}</div>
                    </div>
                    <div class="store-item-book">                 
                        <button class="btn btn-book open-modal-book" data-id="{{ $place->id }}">BOOK</button>
                    </div>
                </div>
            @endforeach
        @else
            There are no places to book
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

                <form>
                    <div class="container-container">
                        <!-- TEST -->
                        <div class="container-input">
                            <div>
                                <p class="show-origin"></p>
                                <p class="show-destination"></p>
                                <p class="show-price"></p>
                            </div>

                            <div class="input-2">
                                <div></div>
                            </div>
                        </div>
                    </div>

                    <div class="container-container">
                        <div class="container-input">
                            <div>
                                <label for="input-full-name">Full Name</label>
                                <input
                                type="text"
                                class="input"
                                id="input-full-name"
                                name="input-full-name"
                                placeholder="e.g. Nadji Roi R. Tan"
                                />
                            </div>

                            <div class="input-2">
                                <div>
                                    <input type="checkbox" id="nationality-toggle" />
                                    <label class="label-nationality">Nationality</label>
                                    <label for="nationality-toggle">
                                        <div class="input input-dropdown">
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
                                    <input type="checkbox" id="gender-toggle" />
                                    <label class="label-gender">Gender</label>
                                    <label for="gender-toggle">
                                        <div class="input input-dropdown">
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
                                <label for="input-full-name">Passport or ID number</label>
                                <input
                                type="text"
                                class="input"
                                id="input-pass-id-number"
                                name="input-pass-id-number"
                                placeholder="Passport or ID number..."
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
                                name="input-full-surname"
                                placeholder="e.g. Tan"
                                />
                            </div>

                            <div>
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
                                            <div class="input input-dropdown input-month-DB">
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
                                <label for="container-date-PI">Passport or ID expiry date</label>
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
                                            <div class="input input-dropdown input-month-PI">
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

                    <div class="container-container">
                        <!-- TEST -->
                        <div class="container-input">
                            <div>
                                <label for="input-full-name">Full Name</label>
                                <input
                                type="text"
                                class="input"
                                id="input-full-name"
                                name="input-full-name"
                                placeholder="e.g. Nadji Roi R. Tan"
                                />
                            </div>

                            <div class="input-2">
                                <div>
                                    <input type="checkbox" id="nationality-toggle" />
                                    <label class="label-nationality">Nationality</label>
                                    <label for="nationality-toggle">
                                        <div class="input input-dropdown">
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
                                    <input type="checkbox" id="gender-toggle" />
                                    <label class="label-gender">Gender</label>
                                    <label for="gender-toggle">
                                        <div class="input input-dropdown">
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