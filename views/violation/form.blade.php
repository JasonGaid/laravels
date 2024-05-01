@extends('layouts.app')

@section('title', isset($violation) ? 'Edit Violation' : 'Add Violation')

@section('contents')
  <form action="{{ isset($violation) ? route('violation.update', $violation->id) : route('violation.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($violation) ? 'Edit Violation' : 'Add Violation' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="negative_comments">Negative Comments</label>
              <input type="text" class="form-control" id="negative_comments" name="negative_comments" value="{{ isset($violation) ? $violation->negative_comments : '' }}">
            </div>
            <div class="form-group">
              <label for="intimidating_language">Intimidating Language</label>
              <input type="text" class="form-control" id="intimidating_language" name="intimidating_language" value="{{ isset($violation) ? $violation->intimidating_language : '' }}">
            </div>
            <div class="form-group">
              <label for="insults_based_on_personal_characteristics">Insults Based on Personal Characteristics</label>
              <input type="text" class="form-control" id="insults_based_on_personal_characteristics" name="insults_based_on_personal_characteristics" value="{{ isset($violation) ? $violation->insults_based_on_personal_characteristics : '' }}">
            </div>
            <div class="form-group">
              <label for="threats_of_physical_violence">Threats of Physical Violence</label>
              <input type="text" class="form-control" id="threats_of_physical_violence" name="threats_of_physical_violence" value="{{ isset($violation) ? $violation->threats_of_physical_violence : '' }}">
            </div>
            <div class="form-group">
              <label for="public_ridicule">Public Ridicule</label>
              <input type="text" class="form-control" id="public_ridicule" name="public_ridicule" value="{{ isset($violation) ? $violation->public_ridicule : '' }}">
            </div>
            <div class="form-group">
              <label for="shaming">Shaming</label>
              <input type="text" class="form-control" id="shaming" name="shaming" value="{{ isset($violation) ? $violation->shaming : '' }}">
            </div>
            <div class="form-group">
              <label for="unsolicited_sexual_advances">Unsolicited Sexual Advances</label>
              <input type="text" class="form-control" id="unsolicited_sexual_advances" name="unsolicited_sexual_advances" value="{{ isset($violation) ? $violation->unsolicited_sexual_advances : '' }}">
            </div>
            <div class="form-group">
              <label for="inappropriate_comments">Inappropriate Comments</label>
              <input type="text" class="form-control" id="inappropriate_comments" name="inappropriate_comments" value="{{ isset($violation) ? $violation->inappropriate_comments : '' }}">
            </div>
            <div class="form-group">
              <label for="direct_threats">Direct Threats</label>
              <input type="text" class="form-control" id="direct_threats" name="direct_threats" value="{{ isset($violation) ? $violation->direct_threats : '' }}">
            </div>
            <div class="form-group">
              <label for="offensive_language">Offensive Language</label>
              <input type="text" class="form-control" id="offensive_language" name="offensive_language" value="{{ isset($violation) ? $violation->offensive_language : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('violation.index') }}" class="btn btn-secondary">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
