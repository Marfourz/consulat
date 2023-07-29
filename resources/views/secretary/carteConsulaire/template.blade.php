
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body >
        <div class="card">
            <div class="card-left">
                <div>
                    <span>Nom: </span>
                    <span>{{ $demande->user->lastname }}</span><br>
                    <span class="enName">Name</span>
                </div>
                <div>
                    <span>Prénom(s): </span>
                    <span>{{ $demande->user->firstname }}</span><br>
                    <span class="enName">Other name</span>
                </div>
                <div>
                    <span>Né(e) le: </span>
                    <span>{{$demande->user->birthday }}</span><br>
                    <span class="enName">Born on</span>
                </div>
                <div>
                    <span>A: </span>
                    <span>{{$demande->user->birthplace }}</span><br>
                    <span class="enName">in</span>
                </div>
                <div>
                    <span>Fils/Fille de: </span>
                    <span>{{$demande->father_name }}</span><br>
                    <span class="enName">Son / Daughter of</span>
                </div>
                <div>
                    <span>Et de : </span>
                    <span>{{$demande->mother_name }}</span><br>
                    <span class="enName">And of</span>
                </div>
                <div style="font:bold">NATIONALITÉ IVOIRIENNE</div>
    
                <div>
                    <span>Profession: </span>
                    <span>{{$demande->user->profession }}</span><br>
                    <span class="enName">Occupation</span>
                </div>
                <div>
                    <span>Adresse: </span>
                    <span>{{$demande->user->adress }}</span><br>
                    <span class="enName">Adress</span>
                </div>
    
                <div>
                    <span>est immatriculé (e) à: </span>
                    <span>{{$demande->user->piece_etablishment_place }}</span><br>
                    <span class="enName">Registration name</span>
                </div>
    
                <div>
                    <span>Sous le N°: </span>
                    <span>{{$demande->piece_number}}</span><br>
                    <span class="enName">Name</span>
                </div>
            </div>
            <div class="card-right">
                <div>VALABLE POUR UN AN à partir du : </div>
                <div>Valid for one year from</div>
                <div>{{$demande->piece_etablish_at }}</div>
                
                <div class="picture-wrapper">
                    <img  src="{{ asset('storage/'.$demande->path_picture)}}" alt="" width="100px" height="100px">
                    <div class="picture-title">
                        <span>Signature ou Empreinte du Titulaire</span><br>
                        <span>Bearer's Signature & Finger Print</span>
                    </div>
                </div>
    
                <div style="text-align: center;margin-top:12px">Le {{$demande->piece_etablish_at }}</div>
               
            </div>
        </div>
    </body>
    
    <style>
      .card{
       
     
       background-color: white;
       font-size: 10px;


   }

   .card-left{
       float: left;
       font-size: 10px;
       display: inline-block;
       height: 100%;
       
     
   }

   .card-right{
        clear: both;
       float: right;
       display: inline-block;
   }
    
        .enName{
            font-style: italic;
            font-size: 9px;
            margin-bottom: 8px
        }
    
        .picture-wrapper{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 12px;
        }   
    
        .picture{
            width: 100px;
            height: 100px;
            background-color: yellow;
            
            
        }
    
        .picture-title{
            text-align: center;
            margin-top: 8px;
        }
    
    </style>
    </html>