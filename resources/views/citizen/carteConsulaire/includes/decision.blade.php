@foreach($demande->traitements as $traitement)
@if($traitement->status == 'accept')

<div class="flex mb-4 bg-green-700 text-white rounded-lg px-4 py-3 justify-between">
    <div>
        Demande accepté et document généré avec succès
    </div>
    <div>
        <a href="{{asset($traitement->document)}}"><button class="bg-white shadow-xl py-1 px-2 rounded text-gray-700 font-bold">Télécharger la carte consulaire</button></a>
        
    </div>
    
</div>

@elseif($traitement->status == 'reject')
<div class="mb-4 shadow">
    <div class="flex bg-red-600 text-white rounded-top-lg px-4 py-3 justify-between">
        Demande rejetée
    </div>
    <div class="border-2 bg-white p-4">
        <div class="font-bold underline mb-2">Motif du rejet</div>
        <div class="bg-gray-200 rounded-lg p-3">
           {{$traitement->comment}}
        </div>
    </div>
</div>

@endif

@endforeach

<div class="w-full bg-yellow-100 rounded-lg border-2 px-4 py-3  mb-4">
    Nouvellement effectuée
</div>