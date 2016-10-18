  <td>
    <select class="form-control select2" id=condicion-{$tipoCond}-{$idIteracion} style="width: 100%;" id="ddDeptos" name='{$tipoCond}[{$idIteracion}]' onchange="TMH.traerRestantes(this)">
      <option value = "-1">Seleccione opcion</option>
      {foreach key=$keyCond from=$slaCondiciones item=$valueCond}
        {if $tipoCond == 'pre'}
        {$data=null}
          {foreach from=$valueCond->getSlaParametro() item=$parametro}
            {$data[] = [$parametro->getSlaParametroId()=>['descripcion'=>$parametro->getDescripcion()]]}
          {/foreach}
          <option value="{$valueCond->getSlaCondicionId()}"  {if $valueCond->getSlaCondicionId() == $slaCondicionesEleccion } selected {/if}>{$valueCond->getNombre()}</option>
        {/if}
        {if $tipoCond == 'vencimiento'}
        {$data=null}
          {foreach from=$valueCond->getSlaParametro() item=$parametro}
            {$data[] = [$parametro->getSlaParametroId()=>['descripcion'=>$parametro->getDescripcion()]]}
          {/foreach}
          <option value="{$valueCond->getSlaCondicionId()}" {if $valueCond->getSlaCondicionId() == $slaCondicionesEleccion } selected {/if}>{$valueCond->getNombre()}</option>
        {/if}
        {if $tipoCond == 'post'}
        {$data=null}
          {foreach from=$valueCond->getSlaParametro() item=$parametro}
            {$data[] = [$parametro->getSlaParametroId()=>['descripcion'=>$parametro->getDescripcion()]]}
          {/foreach}
          <option value="{$valueCond->getSlaCondicionId()}"  {if $valueCond->getSlaCondicionId() == $slaCondicionesEleccion } selected {/if}>{$valueCond->getNombre()}</option>
        {/if}
        
      {/foreach}
    </select>
  </td>