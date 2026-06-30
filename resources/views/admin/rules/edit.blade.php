@extends('layouts.admin')

@section('content')

<div class="card p-4">

    <h2 class="fw-bold mb-4">
        Edit Tata Tertib
    </h2>

    <form
        method="POST"
        action="/admin/rules/{{ $rule->id }}"
    >

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="form-label">
                Isi Tata Tertib
            </label>

            <textarea
                name="isi"
                rows="5"
                class="form-control"
                required
            >{{ $rule->isi }}</textarea>

        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a
            href="/admin/rules"
            class="btn btn-secondary"
        >
            Kembali
        </a>

    </form>

</div>

@endsection