<div class="ticket"> <!--esta es la vista del ticket del abono-->
    <h2>Compra registrada</h2>

    <p><strong>Fecha de compra:</strong>
        <?= htmlspecialchars($datos['valores']['fecha'] ?? '') ?>
    </p>

    <p><strong>Abonado:</strong>
        <?= htmlspecialchars($datos['valores']['abonado'] ?? '') ?>
    </p>

    <p><strong>Teléfono:</strong>
        <?= htmlspecialchars($datos['valores']['telefono'] ?? '') ?>
    </p>

    <p><strong>Tipo de abono:</strong>
        <?= htmlspecialchars(ucfirst($datos['valores']['tipoDescripcion'] ?? '')) ?>
    </p>

    <p><strong>Asiento:</strong>
        <?= htmlspecialchars($datos['valores']['asiento'] ?? '') ?>
    </p>

    <p><strong>Precio total:</strong>
        <?= htmlspecialchars(($datos['valores']['precio'] ?? '0') . ' €') ?>
    </p>

    <p><strong>Tarifa especial:</strong>
        <?= htmlspecialchars($datos['valores']['tarifa'] ?? '') ?>
    </p>
</div>
