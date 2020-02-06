<?php

namespace App\Http\Controllers;

use App\MacAddress;
use Illuminate\Http\Request;

class MacAddressController extends Controller
{
    public function view(Request $request) {
        $mac =  $request->get('mac');
        $contract = $request->get('contract_id');

        $data = \DB::table('mac_addresses')
            ->select('bitrate', 'time', 'rss', 'clients')
            ->where('mac_address', '=', $mac)
            ->limit('24')
            ->get();

        return view('mac.mac', [
            'mac' => $mac,
            'contract' => $contract,
            'maxbitrate' => $this->maxbitrate($data),
            'minbitrate' => $this->minbitrate($data),
            'avgbitrate' => $this->avgbitrate($data),
            'maxrss' => $this->maxrss($data),
            'minrss' => $this->minrss($data),
            'avgrss' => $this->avgrss($data),
            'maxclients' => $this->maxclients($data),
            'minclients' => $this->minclients($data),
            'avgclients' => $this->avgclients($data),
            'time' => $this->time($data),

        ]);
    }

    public function showCustomDate(Request $request) {
        $mac =  $request->get('mac');
        $contract = $request->get('contract');
        $date = $request->get('date');
        $startdate = explode(' - ', $date)[0];
        $startdate = date('Y-m-d', strtotime($startdate));
        $enddate = explode(' - ', $date)[1];
        $enddate = date('Y-m-d', strtotime($enddate));
        $data = \DB::table('mac_addresses')
            ->select('bitrate', 'time', 'rss', 'clients')
            ->where('mac_address', '=', $mac)
            ->where('time', '>=', $startdate)
            ->where('time', '<=', $enddate)
            ->orderBy('time', 'asc')
            ->get();

//        var_dump($startdate);
//        var_dump($enddate);

        return view('mac.mac', [
            'mac' => $mac,
            'contract' => $contract,
            'maxbitrate' => $this->maxbitrate($data),
            'minbitrate' => $this->minbitrate($data),
            'avgbitrate' => $this->avgbitrate($data),
            'maxrss' => $this->maxrss($data),
            'minrss' => $this->minrss($data),
            'avgrss' => $this->avgrss($data),
            'maxclients' => $this->maxclients($data),
            'minclients' => $this->minclients($data),
            'avgclients' => $this->avgclients($data),
            'time' => $this->time($data),
            'startdate' => $startdate,
            'enddate' => $enddate,

        ]);
    }

    public function maxbitrate($data)
    {
        $bitrate = $data;
        $results = count($bitrate);
        $chunk_size = $results / 12;
        $bitrate = json_encode($bitrate);
        $bitrate = json_decode($bitrate);
        $chunks = array_chunk($bitrate, $chunk_size);
        $max = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $cbr) {
                array_push($temp_array, $cbr->bitrate);
            }
            array_push($max, max($temp_array));
        }
        return $max;
    }

    public function minbitrate($data) {
        $bitrate = $data;
        $results = count($bitrate);
        $chunk_size = $results / 12;
        $bitrate = json_encode($bitrate);
        $bitrate = json_decode($bitrate);
        $chunks = array_chunk($bitrate, $chunk_size);
        $min = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $cbr) {
                array_push($temp_array, $cbr->bitrate);
            }
            array_push($min, min($temp_array));
        }
        return $min;
    }

    public function avgbitrate($data) {
        $bitrate = $data;
        $results = count($bitrate);
        $chunk_size = $results / 12;
        $bitrate = json_encode($bitrate);
        $bitrate = json_decode($bitrate);
        $chunks = array_chunk($bitrate, $chunk_size);
        $avg = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $cbr) {
                array_push($temp_array, $cbr->bitrate);
            }
            array_push($avg, array_sum($temp_array) / $chunk_size);
        }
        return $avg;
    }

    public function time($data) {
        $bitrate = $data;
        $results = count($bitrate);
        $chunk_size = $results / 12;
        $bitrate = json_encode($bitrate);
        $bitrate = json_decode($bitrate);
        $chunks = array_chunk($bitrate, $chunk_size);
        $time = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $cbr) {
                array_push($temp_array, $cbr->time);
            }
            $mid = 1; //TODO
//            dd($chunks);
            array_push($time, $temp_array[$mid]);
        }
        return $time;
    }

    public function maxrss($data) {
        $rss = $data;
        $results = count($rss);
        $chunk_size = $results / 12;
        $rss = json_encode($rss);
        $rss = json_decode($rss);
        $chunks = array_chunk($rss, $chunk_size);
        $max = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $crss) {
                array_push($temp_array, $crss->rss);
            }
            array_push($max, max($temp_array));
        }
        return $max;
    }

    public function minrss($data) {
        $rss = $data;
        $results = count($rss);
        $chunk_size = $results / 12;
        $rss = json_encode($rss);
        $rss = json_decode($rss);
        $chunks = array_chunk($rss, $chunk_size);
        $min = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $minrss) {
                array_push($temp_array, $minrss->rss);
            }
            array_push($min, min($temp_array));
        }
        return $min;
    }

    public function avgrss($data) {
        $rss = $data;
        $results = count($rss);
        $chunk_size = $results / 12;
        $rss = json_encode($rss);
        $rss = json_decode($rss);
        $chunks = array_chunk($rss, $chunk_size);
        $avg = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $arss) {
                array_push($temp_array, $arss->rss);
            }
            array_push($avg, array_sum($temp_array) / $chunk_size);
        }
        return $avg;
    }

    public function maxclients($data) {
        $cl = $data;
        $results = count($cl);
        $chunk_size = $results / 12;
        $cl = json_encode($cl);
        $cl = json_decode($cl);
        $chunks = array_chunk($cl, $chunk_size);
        $max = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $cls) {
                array_push($temp_array, $cls->clients);
            }
            array_push($max, max($temp_array));
        }
        return $max;
    }

    public function minclients($data) {
        $cl = $data;
        $results = count($cl);
        $chunk_size = $results / 12;
        $cl = json_encode($cl);
        $cl = json_decode($cl);
        $chunks = array_chunk($cl, $chunk_size);
        $min = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $mincl) {
                array_push($temp_array, $mincl->clients);
            }
            array_push($min, min($temp_array));
        }
        return $min;
    }

    public function avgclients($data) {
        $cls = $data;
        $results = count($cls);
        $chunk_size = $results / 12;
        $cls = json_encode($cls);
        $cls = json_decode($cls);
        $chunks = array_chunk($cls, $chunk_size);
        $avg = [];

        foreach ($chunks as $chunk) {
            $temp_array = [];
            foreach ($chunk as $cl) {
                array_push($temp_array, $cl->clients);
            }
            array_push($avg, array_sum($temp_array) / $chunk_size);
        }
        return $avg;
    }

}
