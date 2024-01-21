<?php

/**
 * @OA\Info(title="Electronics Ecommerce API", version="1.0")
 */

/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     tags={"Authentication"},
 *     summary="Authenticate a user",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 type="object",
 *                 @OA\Property(property="email", type="string"),
 *                 @OA\Property(property="password", type="string")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", default=true),
 *             @OA\Property(property="message", type="string"),
 *             @OA\Property(
 *                 property="data",
 *                 type="object",
 *                 @OA\Property(property="name", type="string"),
 *                 @OA\Property(property="email", type="string")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Bad request",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="success", type="boolean", default=false),
 *             @OA\Property(
 *                 property="errors",
 *                 type="object",
 *                 @OA\Property(property="message", type="string")
 *             )
 *         )
 *     )
 * )
 */

