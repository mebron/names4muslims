@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="contenft">
            <div class="card mb-3">
                <div class="card-header bg-boy">
                    <h1>Circumcision</h1>
                </div>
                <div class="card-body">
                    <p class="text-justify">
                        Circumcision is a Sunnat for males between the ages of 7 to 12 years. To circumcise after the age of 12 is prohibited. It is best to circumcise at an early age, even during Aqeeqa (7th day) as the child heals very quickly and does not suffer much. There is no need to have functions to celebrate the process of circumcision.
                    </p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-boy">
                    <h2>How is circumcision done?</h2>
                </div>
                <div class="card-body">
                    <p class="text-justify">
                        <img src="{{ URL::asset('img/circumcision.png') }}" alt="Circumcision" class="img-thumbnail"/>
                        During circumcision, the foreskin is freed from the head of the penis, and the excess foreskin is clipped off.If done in the newborn period, the circumcision procedure takes about 5 to 10 minutes.The circumcision generally heals in five to seven days.
                    </p>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-boy">
                    <h2>Circumcision might have various health benefits, including:</h2>
                </div>
                <div class="card-body">
                    <ol>
                        <li>Easier hygiene. Circumcision makes it simpler to wash the penis. Washing beneath the foreskin of an uncircumcised penis is generally easy, however.</li>
                        <li>Decreased risk of urinary tract infections. The overall risk of urinary tract infections in males is low, but these infections are more common in uncircumcised males. Severe infections early in life can lead to kidney problems later on.</li>
                        <li>Decreased risk of sexually transmitted infections. Circumcised men might have a lower risk of certain sexually transmitted infections, including HIV. Still, safe sexual practices remain essential.</li>
                        <li>Prevention of penile problems. Occasionally, the foreskin on an uncircumcised penis can be difficult or impossible to retract (phimosis). This can lead to inflammation of the foreskin or head of the penis.</li>
                        <li>Decreased risk of penile cancer. Although cancer of the penis is rare, it's less common in circumcised men. In addition, cervical cancer is less common in the female sexual partners of circumcised men.</li>
                    </ol>
                    <p>
                        Circumcision doesn't affect fertility, nor is circumcision generally thought to enhance or detract from sexual pleasure for men or their partners.</p>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
