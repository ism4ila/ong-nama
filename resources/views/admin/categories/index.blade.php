@extends('layouts.admin') {{-- Assure-toi que 'layouts.admin' est ton layout principal pour l'admin --}}

@section('title', __('Categories')) {{-- Titre de la page traduit --}}

@section('main-content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Categories') }}</h1>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">{{ __('Add Category') }}</span>
        </a>
    </div>

    <p class="mb-4">{{ __('List of all categories.') }}</p>

    {{-- Messages de session (succès, erreur, etc.) --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ __('Categories') }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Slug') }}</th>
                            {{-- Afficher la description uniquement si elle est dans les champs traduisibles et que vous voulez la voir ici --}}
                            @if(in_array('description', (new \App\Models\Category)->getTranslatableAttributes()))
                                <th>{{ __('Description') }}</th>
                            @endif
                            <th>{{ __('Created At') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>
                                {{-- Affiche la traduction du nom dans la locale actuelle de l'application --}}
                                {{ $category->name }} 
                                <br>
                                {{-- Optionnel : Afficher les autres traductions disponibles --}}
                                <small class="text-muted">
                                    @foreach (['en', 'fr', 'ar'] as $locale) {{-- Adapte avec tes $supportedLocales --}}
                                        @if ($category->getTranslation('name', $locale, false) && app()->getLocale() !== $locale)
                                            <span class="badge badge-light">{{ strtoupper($locale) }}: {{ $category->getTranslation('name', $locale) }}</span>
                                        @endif
                                    @endforeach
                                </small>
                            </td>
                            <td>
                                {{-- Affiche la traduction du slug dans la locale actuelle --}}
                                {{ $category->slug }}
                                <br>
                                <small class="text-muted">
                                     @foreach (['en', 'fr', 'ar'] as $locale)
                                        @if ($category->getTranslation('slug', $locale, false) && app()->getLocale() !== $locale)
                                            <span class="badge badge-light">{{ strtoupper($locale) }}: {{ $category->getTranslation('slug', $locale) }}</span>
                                        @endif
                                    @endforeach
                                </small>
                            </td>
                            {{-- Afficher la description --}}
                            @if(in_array('description', $category->getTranslatableAttributes()))
                                <td>{{ Str::limit($category->description, 50) }}</td> {{-- Affiche la traduction de la description --}}
                            @endif
                            <td>{{ $category->created_at ? $category->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                            <td>
                                <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-info btn-circle btn-sm" title="{{ __('View') }}">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-warning btn-circle btn-sm" title="{{ __('Edit') }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline;" onsubmit="return confirm('{{ __('Confirm Delete') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-circle btn-sm" title="{{ __('Delete') }}">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="{{ in_array('description', (new \App\Models\Category)->getTranslatableAttributes()) ? '6' : '5' }}" class="text-center">{{ __('No categories found.') }}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    {{-- Si tu utilises un plugin spécifique pour les DataTables, tu peux ajouter les CSS ici --}}
    {{-- Par exemple, pour DataTables Bootstrap : --}}
    {{-- <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"> --}}
@endpush

@push('scripts')
    {{-- Si tu utilises un plugin spécifique pour les DataTables, tu peux ajouter les JS ici --}}
    {{-- Par exemple, pour DataTables Bootstrap : --}}
    {{-- <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script> --}}
    {{-- <script> --}}
    {{-- $(document).ready(function() { --}}
    {{--   $('#dataTable').DataTable(); // Initialise DataTables si tu l'utilises --}}
    {{-- }); --}}
    {{-- </script> --}}
@endpush