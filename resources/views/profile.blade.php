@extends('layouts.app')

@section('pageTitle', '- Profile')

@section('content')
    <div class="container-profile">
        <div class="profile-header">
            <img src="{{ asset('img/Vertical.svg') }}" alt="">
            <p class="username">{{ $username }}</p>
        </div>

        @if ($errors->any())
            <div class="text-alert" style="font-weight: bold; padding-bottom: 20px;">
                Please fill up all fields.
            </div>
        @endif

        <div class="profile-nav">
            <button class="btn btn-details">
                Details
            </button>

            <button class="btn btn-purchases">
                Purchases
            </button>
        </div>

        <div class="profile-body">
            <form action="{{ route('profile') }}" method="POST" class="profile-details">
                @csrf
                <div class="body-inputs">
                    <label for="email" style="margin-left: 10px">EMAIL</label>
                    <input type="email" class="input" name="email" value="{{ $email }}" placeholder="n/a" readonly>
                </div>
                <div class="body-inputs">
                    <div>
                        <label for="name">NAME</label>
                        <div class="icon-edit"></div>
                    </div>
                    <input type="text" class="input" name="name" value="@isset($name) {{ $name }} @endisset" placeholder="n/a" readonly>
                </div>
                <div class="body-inputs">
                    <div>
                        <label for="gender">GENDER</label>
                        <div class="icon-edit"></div>
                    </div>
                    <input type="text" class="input" name="gender" value="@isset($gender) {{ $gender }} @endisset" placeholder="n/a" readonly>
                </div>
                <div class="body-inputs">
                    <div>
                        <label for="age">AGE</label>
                        <div class="icon-edit"></div>
                    </div>
                    <input type="text" class="input" name="age" value="@isset($age) {{ $age }} @endisset" placeholder="n/a" readonly min="1" maxlength="3" onkeypress="return onlyNumberKey(event)">
                </div>
                <div class="body-inputs">
                    <div>
                        <label for="date_of_birth">DATE OF BIRTH</label>
                        <div class="icon-edit"></div>
                    </div>
                    <input type="text" class="input" name="date_of_birth" value="@isset($date_of_birth) {{ $date_of_birth }} @endisset" placeholder="n/a" readonly>
                </div>
                <div class="body-inputs">
                    <div>
                        <label for="birthplace">BIRTHPLACE</label>
                        <div class="icon-edit"></div>
                    </div>
                    <input type="text" class="input" name="birthplace" value="@isset($birthplace) {{ $birthplace }} @endisset" placeholder="n/a" readonly>
                </div>
                <div class="body-inputs" style="grid-column: span 2; justify-content: center; display: none;" id="save-profile-div">
                    <button class="btn" style="color: white; background-color: rgb(78, 212, 85);" type="submit" id="save-profile">Save Changes</button>
                </div>
            </form>
    
            <div class="profile-purchases">
                <table>
                    <tr>
                      <th>ORIGIN</th>
                      <th>DESTINATION</th>
                      <th>PRICE</th>
                      <th>PURCHASE DATE</th>
                    </tr>
                    @if ($tickets->count())
                        @foreach ($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->origin }}</td>
                                <td>{{ $ticket->destination }}</td>
                                <td>₱ {{ number_format($ticket->price, 2, '.', ',') }}</td>
                                <td>{{ $ticket->created_at->format('j M Y') }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr style="font-size: 2rem;">
                            <td colspan="4">You don't have any tickets...</td>
                        </tr>   
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection