<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ustensiles Logement') }} {{ $details->libelle }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-6 py-6">
                <div class="col-sm-12">
                    <div class="white-box printableArea">
                        <h3 class="box-title m-b-0">{{ __('Liste Ustensile Logement') }} {{ $details->libelle }}</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <address>
                                        <h3> &nbsp;<b class="text-danger">Appartement Efoulan</b></h3>
                                        <p class="text-muted m-l-5">E 104, Dharti-2,
                                            <br/> Nr' Viswakarma Temple,
                                            <br/> Talaja Road,
                                            <br/> Bhavnagar - 364002</p>
                                    </address>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="table-responsive m-t-40" style="clear: both;">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th class="text-center">Quantité</th>
                                            <th class="text-right">Numéro de chambre</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($details->sachen as $item)
                                            <tr>
                                                <td >{{ $item->name }}</td>
                                                <td class="text-center">{{ $item->quantity }}</td>
                                                <td class="text-right">{{ $details->libelle }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="text-right">
                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
