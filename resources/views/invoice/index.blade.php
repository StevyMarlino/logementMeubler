<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des Factures') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg sm:px-6 py-6">
                <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Data Export</h3>
                        <p class="text-muted m-b-30">Export data to Copy, CSV, Excel, PDF & Print</p>
                        <div class="table-responsive">
                            <table id="example23" class="display nowrap" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Description</th>
                                    <th>Durée du Séjour</th>
                                    <th>Prix unitaire</th>
                                    <th>Montant Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoice as $item)
                                    <tr>
                                        <td class="text-left">{{ $item->description }}</td>
                                        <td class="text-center">{{ $item->quantity }}</td>
                                        <td class="text-center">XAF {{ number_format($item->unit_price) }}</td>
                                        <td class="text-center">XAF {{ number_format($item->total_amount) }}</td>
                                        <td class="text-center">{{ $item->status_reservation }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('invoice.details',$item->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
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
</x-app-layout>
