<?php

namespace App\Exports\Guru;

use App\Models\Rapot;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RapotExport implements FromQuery, WithMapping, WithHeadings
{
    use Exportable;

    public $tahunId;

    public $semesterId;

    public $kelasId;

    public function __construct(string $tahunId, string $semesterId, string $kelasId)
    {
        $this->tahunId = $tahunId;
        $this->semesterId = $semesterId;
        $this->kelasId = $kelasId;
    }
    /**
     * Query
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return Rapot::query()
                ->select(['siswa_id', 'nilai'])
                ->where('tahun_id', $this->tahunId)
                ->where('semester_id', $this->semesterId)
                ->where('guru_id', auth()->guard('guru')->id())
                ->where('kelas_id', $this->kelasId)
                ->with(['siswa']);
    }
    /**
     * map column
     *
     * @param Rapot $rapot
     * @return array
     */
    public function map($rapot): array
    {
        return [
            $rapot->siswa['nisn'],
            $rapot->siswa['nama'],
            $rapot->nilai
        ];
    }
    /**
     * Set heading
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            '#',
            'Nama Siswa',
            'Nilai'
        ];
    }
}
