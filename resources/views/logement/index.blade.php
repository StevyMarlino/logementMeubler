<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listes des Appartements') }}
        </h2>
    </x-slot>

    <div class="py-12">
{{--        {{ dd(auth()->user()->hasRole('Admin')) }}--}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->isAdmin())
                <button type="button" class="btn btn-success bg-success mb-2" data-toggle="modal"
                        data-target="#logementModal">{{ __('Nouveaux Logement') }}</button>

                <button type="button" class="btn btn-success bg-success mb-2" data-toggle="modal"
                        data-target="#sachenModal">{{ __('Ajout Ustensile') }}</button>
            @endif
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-6 py-6">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data Export</h3>
                        <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ __('Numéro de chambre') }}</th>
                                    <th>{{ __('Type') }}</th>
                                    <th>{{ __('Prix') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Models\logement::all() as $item)
                                    <tr>
                                        <td>{{ $item->libelle }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>{{ number_format( $item->price) }} FCFA</td>
                                        <td>
                                            <a href="{{ route('logement.details',$item->id) }}"
                                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Ajouter Un Logement</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('logement.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Numéro de chambre :</label>
                            <input type="text" name="libelle" class="form-control" id="recipient-name1">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Type de logement</label>
                            <select name="type" class="form-control custom-select col-12"
                                    id="inlineFormCustomSelect">
                                    <option value="appartement">Appartement</option>
                                    <option value="studio">Studio</option>
                                    <option value="chambre">Chambre</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Prix</label>
                            <input type="number" name="price" class="form-control" id="recipient-name1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bg-gray-500" data-dismiss="modal">Fermer
                            </button>
                            <button type="submit" class="btn btn-primary bg-success">Ajouter</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="sachenModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Ajouter Un Logement</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('sachen.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Désignation :</label>
                            <input type="text" name="libelle" class="form-control" id="recipient-name1">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Appartemant au logement</label>
                            <select name="logement_id" class="form-control custom-select col-12"
                                    id="inlineFormCustomSelect">
                                @foreach(App\Models\logement::all() as $item)
                                    <option value="{{ $item->id }}">{{$item->libelle}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Quantité</label>
                            <input type="quantity" name="quantity" class="form-control" id="recipient-name1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bg-gray-500" data-dismiss="modal">Fermer
                            </button>
                            <button type="submit" class="btn btn-primary bg-success">Ajouter</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
