<?php

namespace App\Http\Controllers;

use App\Models\Certifications;
use App\Http\Requests\StoreCertificationsRequest;
use App\Http\Requests\UpdateCertificationsRequest;

class CertificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCertificationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certifications  $certifications
     * @return \Illuminate\Http\Response
     */
    public function show(Certifications $certifications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certifications  $certifications
     * @return \Illuminate\Http\Response
     */
    public function edit(Certifications $certifications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificationsRequest  $request
     * @param  \App\Models\Certifications  $certifications
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCertificationsRequest $request, Certifications $certifications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certifications  $certifications
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certifications $certifications)
    {
        //
    }
}
