<div class="sidebar" style="width: 250px; background: #2c3e50; color: white; height: 100vh; padding: 20px;">
    <div style="margin-bottom: 30px;">
        <h2 style="color: white; margin: 0;">Menu</h2>
    </div>
    <nav>
        <ul style="list-style: none; padding: 0; margin: 0;">
            <li style="margin-bottom: 15px;">
                <a href="{{ route('dashboard') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Dashboard
                </a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('dosen.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Data Dosen
                </a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('bidang-keahlian.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Bidang Keahlian
                </a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('jabatan-fungsional.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Jabatan Fungsional
                </a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('pendidikan-terakhir.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Pendidikan Terakhir
                </a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('kuota-bimbingan.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Kuota Bimbingan
                </a>
            </li>
            <li style="margin-bottom: 15px;">
                <a href="{{ route('minat.index') }}" style="color: white; text-decoration: none; display: block; padding: 10px; border-radius: 4px; transition: background 0.3s;">
                    Minat Penelitian
                </a>
            </li>
        </ul>
    </nav>
</div>