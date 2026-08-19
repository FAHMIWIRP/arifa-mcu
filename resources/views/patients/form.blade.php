@if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 text-red-800 px-4 py-3 rounded-xl text-sm">
        <ul class="list-disc pl-5">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
    <div>
        <label class="block text-sm font-semibold text-slate-700">No MCU <span class="text-red-600">*</span></label>
        <input type="text" name="mcu_number" value="{{ old('mcu_number', $patient->mcu_number) }}" class="mt-1 w-full rounded-xl border-slate-300" required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Nama Lengkap <span class="text-red-600">*</span></label>
        <input type="text" name="name" value="{{ old('name', $patient->name) }}" class="mt-1 w-full rounded-xl border-slate-300" required>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Jenis Kelamin <span class="text-red-600">*</span></label>
        <select name="gender" class="mt-1 w-full rounded-xl border-slate-300" required>
            <option value="Pria" @selected(old('gender', $patient->gender) === 'Pria')>Pria</option>
            <option value="Wanita" @selected(old('gender', $patient->gender) === 'Wanita')>Wanita</option>
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">NIK</label>
        <input type="text" name="nik" value="{{ old('nik', $patient->nik) }}" class="mt-1 w-full rounded-xl border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Tanggal Lahir</label>
        <input type="date" name="birth_date" value="{{ old('birth_date', optional($patient->birth_date)->format('Y-m-d')) }}" class="mt-1 w-full rounded-xl border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">No HP</label>
        <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="mt-1 w-full rounded-xl border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Perusahaan</label>
        <input type="text" name="company_name" value="{{ old('company_name', $patient->company_name) }}" class="mt-1 w-full rounded-xl border-slate-300">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700">Bagian / Seksi</label>
        <input type="text" name="department" value="{{ old('department', $patient->department) }}" class="mt-1 w-full rounded-xl border-slate-300">
    </div>
    <div class="md:col-span-2">
        <label class="block text-sm font-semibold text-slate-700">Alamat</label>
        <textarea name="address" rows="2" class="mt-1 w-full rounded-xl border-slate-300">{{ old('address', $patient->address) }}</textarea>
    </div>
</div>