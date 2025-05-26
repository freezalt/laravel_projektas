<form action="{{ route('submit.form') }}" method="POST">
    @csrf
    <label>Vardas:</label>
    <input type="text" name="name" required>

    <label>El. paštas:</label>
    <input type="email" name="email" required>

    <label>Žinutė:</label>
    <textarea name="message" required></textarea>

    <button type="submit">Siųsti</button>
</form>
