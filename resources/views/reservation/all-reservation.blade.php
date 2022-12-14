<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listes des Reservations') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button type="button" class="btn btn-success bg-success mb-2" data-toggle="modal"
                    data-target="#reservationModal">{{ __('Nouvelle Réservation') }}</button>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-6 py-6">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data Export</h3>
                        <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>{{ __('Nom du Client') }}</th>
                                    <th>{{ __('Numéro CNI') }}</th>
                                    <th>{{ __('Numéro d\'immatriculation') }}</th>
                                    <th>{{ __('Numéro d\'Appartement') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(App\Models\Reservation::all() as $item)
                                    <tr>
                                        <td>{{ $item->client_name }}</td>
                                        <td>{{ $item->identification_card }}</td>
                                        <td>{{ $item->immatriculation_number }}</td>
                                        <td>{{ $item->apartment_number }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success bg-success" data-toggle="modal"
                                                    data-target="#exampleModal{{$item->id}}">{{ __('Details') }}</button>
                                        </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach(auth()->user()->reservation as $item)
        <div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel1">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel1">Details Réservation
                            de {{ $item->client_name }}</h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Nom du client
                                    :</label> {{ $item->client_name }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Numéro CNI
                                    :</label> {{ $item->identification_card }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Numéro de Chasis
                                    :</label> {{ $item->immatriculation_number }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Numéro du Logement
                                    :</label> {{ ($item->apartment_number)  }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Numéro de Téléphone
                                    :</label> {{ ($item->phone)  }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Numéro de Téléphone
                                    :</label> {{ ($item->phone)  }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Date d'entrée
                                    :</label> {{ $item->start_date  }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Date de sortie
                                    :</label> {{ $item->end_date  }}
                            </div>

                            <div class="form-group">
                                <label for="recipient-name" class="control-label font-bold">Status du paiement
                                    :</label> {{ $item->payment_status  }}
                            </div>


                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default bg-gray-500" data-dismiss="modal">Close</button>
                        <a href="{{ route('invoice.details',$item->invoice->id) }}" type="button"
                           class="btn btn-primary bg-success">Voir la facture</a>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel1">Ajouter Une réservation</h4>
                </div>
                <div class="modal-body">
                    <form action="{{ route('reservation.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nom du client :</label>
                            <input type="text" name="client_name" class="form-control" id="recipient-name1">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Numéro CNI :</label>
                            <input type="text" name="identification_card" class="form-control" id="recipient-name1">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Numéro Chasis :</label>
                            <input type="text" name="immatriculation_number" class="form-control" id="recipient-name1">
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Numéro de téléphone :</label>
                            <input type="text" name="phone" class="form-control" id="recipient-name1">
                        </div>

                        <div class="form-group">
                            <label class="col-sm-12">Numéro du logement</label>
                            <select name="id_logement" class="form-control custom-select col-12"
                                    id="inlineFormCustomSelect">
                                @foreach(App\Models\logement::all() as $item)
                                    <option value="{{ $item->id }}">{{$item->libelle}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nombre de Jours du séjour :</label>
                            <input type="number" name="nombreJours" class="form-control" id="recipient-name1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default bg-gray-500" data-dismiss="modal">Close
                            </button>
                            <button type="submit" class="btn btn-primary bg-success">Sauvegardé</button>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</x-app-layout>
