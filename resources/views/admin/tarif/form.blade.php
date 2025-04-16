<div class="mb-3">
    <label>Jenis Pelanggan</label>
    <input type="text" name="jenis_plg" class="form-control" value="{{ old('jenis_plg', $tarif->jenis_plg ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Daya</label>
    <input type="number" name="daya" class="form-control" value="{{ old('daya', $tarif->daya ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Tarif per kWh</label>
    <input type="text" name="tarif_kwh" class="form-control" value="{{ old('tarif_kwh', $tarif->tarif_kwh ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Biaya Beban</label>
    <input type="number" name="biaya_beban" class="form-control" value="{{ old('biaya_beban', $tarif->biaya_beban ?? '') }}" required>
</div>
