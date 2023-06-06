<div>
    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
    @if ($immovable->name)
    <h2 class="text-white mb-3">Jesteś zainteresowany {{ $immovable->name }}?</h2>
@else
    <h2 class="text-white mb-3">Masz jakieś pytania?</h2>
@endif

    <p class=" text-white mb-5 h5">Napisz do nas, skontaktujemy się z <b>Tobą!</b></p>
    <form wire:submit.prevent="saveData" class="form-signup" id="contactForm">
        <div class="row input-group-newsletter">
            <div class="col">
                <input wire:model="email" class="form-control" id="emailAddress" type="email" name="email"
                    placeholder="Twój adres e-mail" aria-label="Twój adres e-mail" required />
                <textarea wire:model="message" class="form-control mt-3" id="emailAddress" type="text" name="message"
                    placeholder="W czym możemy pomóc?" aria-label="Twoja wiadomość" rows="3"required></textarea>
            </div>
            <button class="btn btn-primary mt-5" id="submitButton" type="submit">Wyślij</button>
        </div>
    </form>

</div>
