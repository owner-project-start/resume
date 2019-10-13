@if(isset($user))
    <input type="hidden" name="_method" value="PUT"/>
    <div class="form-row">
        <div class="form-group col-md-6 col-sm-6 col-6">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First-Name"
                   @if(isset($user->first_name)) value="{{ $user->first_name }}" @endif>
        </div>
        <div class="form-group col-md-6 col-sm-6 col-6">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last-Name"
                   @if(isset($user->last_name)) value="{{ $user->last_name }}" @endif>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 col-sm-6 col-6">
            <label for="email">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" placeholder="E-mail" disabled
                   @if(isset($user->email)) value="{{ $user->email }}" @endif>
        </div>
        <div class="form-group col-md-6 col-sm-6 col-6">
            <label for="phone">Phone Number</label>
            <input type="tel" class="form-control" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" name="phone"
                   id="phone" placeholder="Phone-Number"
                   @if(isset($user->phone)) value="{{ $user->phone }}" @endif>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4 col-sm-2 col-4">
            <label for="home_number">N<sup>o</sup></label>
            <input type="text" class="form-control" name="home_number" id="home_number" placeholder="#N"
                   @if(isset($user->home_number)) value="{{ $user->home_number }}" @endif>
        </div>
        <div class="form-group col-md-4 col-sm-2 col-4">
            <label for="floor">Floor</label>
            <input type="text" class="form-control" name="floor" id="floor" placeholder="Floor"
                   @if(isset($user->floor)) value="{{ $user->floor }}" @endif>
        </div>
        <div class="form-group col-md-4 col-sm-2 col-4">
            <label for="street">Street</label>
            <input type="text" class="form-control" name="street" id="street" placeholder="Street"
                   @if(isset($user->street)) value="{{ $user->street }}" @endif>
        </div>
        <div class="form-group col-md-4 col-sm-2 col-4">
            <label for="khan">Khan</label>
            <input type="text" class="form-control" name="khan" id="khan" placeholder="Khan"
                   @if(isset($user->khan)) value="{{ $user->khan }}" @endif>
        </div>
        <div class="form-group col-md-4 col-sm-2 col-4">
            <label for="songkat">Song Kat</label>
            <input type="text" class="form-control" name="songkat" id="songkat" placeholder="Song-Kat"
                   @if(isset($user->songkat)) value="{{ $user->songkat }}" @endif>
        </div>
        <div class="form-group col-md-4 col-sm-2 col-4">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" id="city" placeholder="City"
                   @if(isset($user->city)) value="{{ $user->city }}" @endif>
        </div>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" rows="3" name="description" id="description" cols="2"
                  placeholder="Description here ...">@if(isset($user->description)){{ $user->description }}@endif
                </textarea>
    </div>
    <div class="form-group">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="status" id="status" value="1"
                   @if(isset($user->status) && $user->status === true) checked @endif>
            <label class="form-check-label" for="status">
                Status
            </label>
        </div>
    </div>
@endif
