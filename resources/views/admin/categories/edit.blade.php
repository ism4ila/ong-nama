@extends('layouts.admin')
@section('title', __('Edit Category') . ': ' . $category->name) {{ $category->name utilisera la locale actuelle }}

@section('main-content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">{{ __('Edit Category') }}: {{ $category->name }}</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <ul class="nav nav-tabs" id="languageTabs" role="tablist">
                    @foreach($supportedLocales as $locale)
                        <li class="nav-item">
                            <a class="nav-link {{ $locale === config('app.locale') ? 'active' : '' }}" id="{{ $locale }}-tab" data-toggle="tab" href="#{{ $locale }}-content" role="tab" aria-controls="{{ $locale }}-content" aria-selected="{{ $locale === config('app.locale') ? 'true' : 'false' }}">{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </ul>

                <div class="tab-content" id="languageTabsContent">
                    @foreach($supportedLocales as $locale)
                        <div class="tab-pane fade {{ $locale === config('app.locale') ? 'show active' : '' }}" id="{{ $locale }}-content" role="tabpanel" aria-labelledby="{{ $locale }}-tab">
                            {{-- Champ Name --}}
                            <div class="form-group mt-3">
                                <label for="name_{{ $locale }}">{{ __('Name') }} ({{ strtoupper($locale) }}) <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('name.'.$locale) is-invalid @enderror" 
                                       id="name_{{ $locale }}" 
                                       name="name[{{ $locale }}]" 
                                       value="{{ old('name.'.$locale, $category->getTranslation('name', $locale, false)) }}"
                                       {{ $locale === 'ar' ? 'dir=rtl' : '' }}
                                       required>
                                @error('name.'.$locale)
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Champ Slug --}}
                             <div class="form-group">
                                <label for="slug_{{ $locale }}">{{ __('Slug') }} ({{ strtoupper($locale) }}) <span class="text-danger">*</span></label>
                                <input type="text" 
                                       class="form-control @error('slug.'.$locale) is-invalid @enderror" 
                                       id="slug_{{ $locale }}" 
                                       name="slug[{{ $locale }}]" 
                                       value="{{ old('slug.'.$locale, $category->getTranslation('slug', $locale, false)) }}"
                                       {{ $locale === 'ar' ? 'dir=rtl' : '' }}
                                       required>
                                @error('slug.'.$locale)
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            {{-- Champ Description (si traduisible) --}}
                            @if(in_array('description', $category->getTranslatableAttributes()))
                            <div class="form-group">
                                <label for="description_{{ $locale }}">{{ __('Description') }} ({{ strtoupper($locale) }})</label>
                                <textarea class="form-control @error('description.'.$locale) is-invalid @enderror" 
                                          id="description_{{ $locale }}" 
                                          name="description[{{ $locale }}]" 
                                          rows="3"
                                          {{ $locale === 'ar' ? 'dir=rtl' : '' }}>{{ old('description.'.$locale, $category->getTranslation('description', $locale, false)) }}</textarea>
                                @error('description.'.$locale)
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <button type="submit" class="btn btn-primary mt-3">{{ __('Update') }}</button>
                <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">{{ __('Cancel') }}</a>
            </form>
        </div>
    </div>
</div>
@endsection