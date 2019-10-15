@extends('layouts.admin')

@section('content')

<div class="card">
  <div class="card-header">
    <h1>Add New Names</h1>
  </div>
  <div class="card-body">
    <form method="post">
      {!! csrf_field() !!}
      <div class="form-group ">

        <label class="control-label requiredField" for="name">
          Name
          <span class="asteriskField">
            *
          </span>
        </label>
        <autocomplete></autocomplete>
      </div>
      <div class="form-group ">
        <label class="control-label requiredField" for="gender">
          Select a Choice
          <span class="asteriskField">
            *
          </span>
        </label>
        <select class="select form-control" id="gender" name="gender">
          <option value="Gender">
            Gender
          </option>
          <option value="Boy">
            Boy
          </option>
          <option value="Girl">
            Girl
          </option>
        </select>
      </div>
      <div class="form-group ">
        <label class="control-label requiredField" for="meaning">
          Meaning
          <span class="asteriskField">
            *
          </span>
        </label>
        <input class="form-control" id="meaning" name="meaning" placeholder="Meaning" type="text" />
      </div>
      <div class="form-group ">
        <label class="control-label " for="arabic">
          Arabic
        </label>
        <input class="form-control" id="arabic" name="arabic" placeholder="Arabic" type="text" />
      </div>
      <div class="form-group ">
        <label class="control-label " for="origin">
          Origin
        </label>
        <input class="form-control" id="origin" name="origin" placeholder="Origin" type="text" />
      </div>
      <div class="form-group ">
        <label class="control-label " for="root">
          Root
        </label>
        <input class="form-control" id="root" name="root" placeholder="Root" type="text" />
      </div>
      <div class="form-group ">
        <label class="control-label " for="text4">
          Alternate Spelling
        </label>
        <input class="form-control" id="text4" name="text4" placeholder="Alternate Spelling" type="text" />
      </div>
      <div class="form-group ">
        <label class="control-label " for="text5">
          Title for this name
        </label>
        <input class="form-control" id="text5" name="text5" placeholder="Title" type="text" />
      </div>
      <div class="form-group ">
        <label class="control-label " for="meta_description">
          Met Description
        </label>
        <textarea class="form-control" cols="40" id="meta_description" name="meta_description"
          placeholder="Meta Description" rows="10"></textarea>
      </div>
      <div class="form-group">
        <div>
          <button class="btn btn-primary " name="submit" type="submit">
            Submit
          </button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
