<td class="{$tipoCond}-param-{$idIteracion}">
  <select class="form-control select2" style="width: 100%;" id="{$tipoCond}-param-{$idIteracion}"  name="{$tipoCond}Param[{$idIteracion}]" {if $parametros == null}disabled {/if}>
    {foreach key=$keyParam from=$parametros item=$preParam}
        {if $slaParametroEleccion}
          <option value ='{$preParam->getSlaParametroId()}' {if $preParam->getSlaParametroId() == $slaParametrosEleccion->getSlaParametroId() } selected {/if} >{$preParam->getDescripcion()}</option>
        {else}
          <option value ='{$preParam->getSlaParametroId()}' >{$preParam->getDescripcion()}</option>
        {/if}
    {/foreach}
  </select>
</td>
